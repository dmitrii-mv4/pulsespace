<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Wish;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Wishlist\WishCreateRequest;
use App\Http\Requests\Wishlist\WishUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class WishController extends Controller
{
    public function index(User $user)
    {
        return 'index';
    }

    public function create(User $user, WishCreateRequest $request)
    {
        //dd($request->all());

        $dataValidated = $request->validated();

        // определяем id пользователя на чей страницы находимся 
        // $url = explode('/', URL::current());
        // $user_id = $url[5];

        // загружаем картинку
        if (!empty(request()->file('image')))
        {
            $fileImage = request()->file('image');

            // Генерируем новое имя файла на основе текущей даты/времени
            $newNameImage = now()->format('Y-m-d_His') . '.' . $fileImage->getClientOriginalExtension();

            // Сохраняем файл с новым именем
            $pathImage = $fileImage->storeAs('public/images/wishlists', $newNameImage);

            // Загружаем фото на диск wishlists
            $pathImage = Storage::disk('wishlists')->putFileAs(
                $fileImage,    // файл 
                $newNameImage  // название файла
            );

            $pathImage = '/storage/images/wishlists/'.$newNameImage;

        } else {
            $pathImage = '/assets/images/lightgallry/01.jpg';
        }

        $wish = Wish::create([
            'title' => $dataValidated['title'],
            'price' => $dataValidated['price'],
            'user_id' => $user->id,
            'link_buy' => $dataValidated['link_buy'],
            'description' => $dataValidated['description'],
            'image' => $pathImage,
        ]);

        if (!empty($dataValidated['lists']))
        {
            // объединяем категории и желания (многие ко многим)
            $wish->lists()->attach($dataValidated['lists']);
        }

        return redirect()->route('user.wishlist.index', $user->id)->with('success', 'Желание успешно загадано!');
    }

    public function update(User $user, Wish $wish, WishUpdateRequest $request)
    {
        // Проверка прав доступа (пример)
        if ($wish->user_id !== $user->id) {
            abort(403);
        }

        //dd($request->all());

        $dataValidated = $request->validated();

        // Получаем экземпляр модели Wishlist
        $wishlist = Wish::findOrFail($wish['id']);

        // Если изображение загружено
        if (!empty(request()->file('image')))
        {
            // Проверяем есть ли старый путь к изображению в БД
            if (!empty($dataValidated['image']))
            {
                $nameImageOld = explode('/', $dataValidated['old_image']);

                if (!empty($nameImageOld[4]))
                {
                    if (file_exists('storage/images/wishlists/' . $nameImageOld[4])) {
                        unlink('storage/images/wishlists/' . $nameImageOld[4]);
                    }
                }
            }

            // Получаем файл изображения
            $fileImage = request()->file('image');

            // Генерируем новое имя файла на основе текущей даты/времени
            $newNameImage = now()->format('Y-m-d_His') . '.' . $fileImage->getClientOriginalExtension();

            // Сохраняем файл с новым именем
            $pathImage = $fileImage->storeAs('public/images/wishlists', $newNameImage);

            // Для доступа через web:
            //$publicPathImage = Storage::url($pathImage);

            // Загружаем фото на диск wishlists
            $PathImage = Storage::disk('wishlists')->putFileAs(
                $fileImage,    // файл 
                $newNameImage  // название файла
            );

            $PathImage = '/storage/images/wishlists/'.$newNameImage;

        } else {
            $PathImage = $dataValidated['old_image'];
        }

        //$wish->update($request->validated());

        $wish->update([
            'title' => $dataValidated['title'],
            'price' => $dataValidated['price'],
            'user_id' => $user->id,
            'link_buy' => $dataValidated['link_buy'],
            'description' => $dataValidated['description'],
            'image' => $PathImage,
        ]);
    
        if (!empty($dataValidated['lists']))
        {
            // объединяем категории и желания (многие ко многим)
            $wish->lists()->sync($request->input('lists', []));
        }

        return redirect()->route('user.wishlist.index', $user->id)->with('success', 'Желание успешно обновлено!');
    }

    public function update_done(User $user, Wish $wish, Request $request)
    {
        // Проверка прав доступа (пример)
        if ($wish->user_id !== $user->id) {
            abort(403);
        }

        $wish->update([
            'done' => $request->input('wish_done')
        ]);

        return redirect()->route('user.wishlist.index', $user->id);
    }

    public function destroy(User $user, Wish $wish)
    {
        // Проверка прав доступа (пример)
        if ($wish->user_id !== $user->id) {
            abort(403);
        }

        // Проверяем есть ли старый путь к изображению в БД
        // if (!empty($wishlist->all()[0]->image))
        // {
        //     $nameImageOld = explode('/', $wishlist->all()[0]->image);

        //     if (!empty($nameImageOld[4]))
        //     {
        //         if (file_exists('storage/images/wishlists/' . $nameImageOld[4])) {
        //             unlink('storage/images/wishlists/' . $nameImageOld[4]);
        //         }
        //     }
        // }

        $wish = Wish::withTrashed()->find($wish->id);

        $wish->delete();

        return redirect()->route('user.wishlist.index', $user->id)->with('success', 'Желание успешно удалено!');
    }
}
