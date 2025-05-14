<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogPostView;
use App\Models\User;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    // выводим в ленту
    public function index()
    {
        $posts = Blog::with(['categories', 'images', 'user'])
        ->withCount('views as views_count')
            ->orderByDesc('created_at')
            ->get();
        $posts = $posts->toArray(); 

        return view('blog/index', compact('posts'));
    }

    // выводим в профиль
    public function user_profile(User $user)
    {
        // выводим все последнего поста
        $posts = Blog::with('categories', 'images')
            ->withCount('views as views_count')
            ->orderByDesc('created_at')
            ->get();
        $posts = $posts->toArray();

        return view('blog/profile', compact('user', 'posts'));
    }

    public function create()
    {
        $categories = BlogCategory::All();

        return view('blog/post_create', compact('categories'));
    }

    public function store(BlogCreateRequest $request)
    {
        $dataValidated = $request->validated();

        // Обработка изображений
        $images = $request->file('images');

        // сохраняем превью
        //$mainImage = $images[0];
        //$mainImagePath = $mainImage->store('', 'blog');

        $post = Blog::create([
            'title' => $dataValidated['title'],
            'description' => $dataValidated['description'],
            //'image' => $mainImagePath,
            'author_user_id' => Auth::user()->id
        ]);

        // загружаем оставшиеся изображения
        foreach ($images as $index => $image) {
            $path = $image->store('', 'blog');
            $post->images()->create([
                'path' => $path, // название файла
                'order' => $index // порядок
            ]);
        }

        if (!empty($dataValidated['categories']))
        {
            // объединяем категории и посты (многие ко многим)
            $post->categories()->sync($dataValidated['categories']);
        }

        return redirect()->route('user.blog.profile', Auth::user()->id)->with('success', 'Новый пост успешно опубликован!');
    }

    public function post(Blog $post)
    {
        $ipAddress = request()->ip();

        // Проверяем существование записи
        $viewExists = $post->views()
            ->where('ip_address', $ipAddress)
            ->exists();

        if (!$viewExists) {
            // Создаём новую запись о просмотре
            BlogPostView::create([
                'post_id' => $post->id,
                'ip_address' => $ipAddress
            ]);
        }

        // Кол-во просмотров поста
        $postViews = $post->getViewsCountAttribute();

        // Жадно загружаем изображения и категории
        $post->load(['images', 'categories']);

        //dd($post['images']);
    
        return view('blog/post', [
            'post' => $post,
            'images' => $post['images'],
            'postViews' => $postViews
        ]);
    }

    public function edit(Blog $post)
    {
        // Проверка прав доступа
        if ($post->author_user_id !== Auth::id()) {
            abort(403, 'У вас нет прав на редактирование этого поста');
        }

        $categories = BlogCategory::all();
        $selectedCategories = $post->categories->pluck('id')->toArray();

        return view('blog.post_edit', compact('post', 'categories', 'selectedCategories'));
    }

    public function update(BlogUpdateRequest $request, Blog $post)
    {
        // Проверка прав доступа
        if ($post->author_user_id !== Auth::id()) {
            abort(403, 'У вас нет прав на редактирование этого поста');
        }

        $data = $request->validated();

        DB::transaction(function () use ($post, $data, $request) {
            // Обновление основного изображения
            if ($request->hasFile('main_image')) {
                // Удаление старого изображения
                if ($post->image) {
                    Storage::disk('blog')->delete($post->image);
                }
                
                // Сохранение нового изображения
                $post->image = $request->file('main_image')->store('', 'blog');
            }

            // Обновление данных поста
            $post->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $post->image
            ]);

            // Обновление категорий
            $post->categories()->sync($data['categories'] ?? []);

            // Обработка дополнительных изображений
            if ($request->hasFile('images')) {
                // Удаление старых изображений
                $post->images->each(function($image) {
                    Storage::disk('blog')->delete($image->path);
                    $image->forceDelete();
                });

                // Добавление новых изображений
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('', 'blog');
                    $post->images()->create([
                        'path' => $path,
                        'order' => $index
                    ]);
                }
            }

            // Обновление порядка изображений
            if ($request->has('image_order')) {
                $this->updateImageOrder($post, $request->input('image_order'));
            }
        });

        return redirect()->route('user.blog.profile', Auth::user()->id)
            ->with('success', 'Пост успешно обновлён');
    }

    private function updateImageOrder(Blog $post, array $order)
    {
        foreach ($order as $position => $imageId) {
            $post->images()
                ->where('id', $imageId)
                ->update(['order' => $position]);
        }
    }

    public function delete(Blog $post)
    {
        // Проверка прав доступа
        if ($post->author_user_id !== Auth::id()) {
            abort(403, 'У вас нет прав на удаление этого поста');
        }

        DB::transaction(function () use ($post) {
            // Удаление файлов изображений
            $this->deleteImageFiles($post);

            // Полное удаление связанных записей
            $post->images()->forceDelete();    // Из таблицы blog_post_images
            $post->categories()->detach();     // Из таблицы blog_posts_join_categories
            
            // Полное удаление поста
            $post->forceDelete(); 
        });

        return redirect()->route('user.blog.profile', Auth::id())
            ->with('success', 'Пост "'. $post->title . '" удалён безвозвратно');
    }

    protected function deleteImageFiles(Blog $post)
    {
        // Удаление основного изображения
        if ($post->image && Storage::disk('blog')->exists($post->image)) {
            Storage::disk('blog')->delete($post->image);
        }

        // Удаление галереи изображений
        $post->images->each(function ($image) {
            if ($image->path && Storage::disk('blog')->exists($image->path)) {
                Storage::disk('blog')->delete($image->path);
            }
        });
    }
}
