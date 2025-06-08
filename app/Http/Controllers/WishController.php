<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Wish;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Wishlist\WishCreateRequest;
use App\Http\Requests\Wishlist\WishUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

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

        // Если аватар загружен
        if ($request->hasFile('image'))
        {
            $fileImage = $request->file('image');

            // Генерируем уникальное имя
            $newNameImage = now()->format('Y-m-d_His') . '.' . $fileImage->extension();

            // Сохраняем в public/users/wishlist
            $pathImage = $fileImage->storeAs('users/wishlist', $newNameImage, 'public');
            $publicPathImage = '/storage/' . $pathImage;
        } else {
            $publicPathImage = '/assets/images/lightgallry/01.jpg';
        }

        // определяем id пользователя на чей страницы находимся 
        // $url = explode('/', URL::current());
        // $user_id = $url[5];

        $wish = Wish::create([
            'title' => $dataValidated['title'],
            'price' => $dataValidated['price'],
            'user_id' => $user->id,
            'link_buy' => $dataValidated['link_buy'],
            'description' => $dataValidated['description'],
            'image' => $publicPathImage,
        ]);

        if (!empty($dataValidated['lists']))
        {
            // объединяем категории и желания (многие ко многим)
            $wish->lists()->attach($dataValidated['lists']);
        }

        return redirect()->route('wishlist.index', $user->id)->with('success', 'Желание успешно загадано!');
    }

    public function update(User $user, Wish $wish, WishUpdateRequest $request)
    {
        //dd($request->all());

        // Проверка прав доступа (пример)
        if ($wish->user_id !== $user->id) {
            abort(403);
        }

        $dataValidated = $request->validated();

        if ($request->hasFile('image'))
        {
            $fileImage = $request->file('image');

            // Удаляем старую картинку
            if (!empty($dataValidated['old_image'])) {
                $oldImagePath = str_replace('/storage/', '', $dataValidated['old_image']);
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            // Генерируем уникальное имя
            $newNameImage = now()->format('Y-m-d_His') . '.' . $fileImage->extension();

            // Сохраняем в public/users/wishlist
            $pathImage = $fileImage->storeAs('users/wishlist', $newNameImage, 'public');
            $publicPathImage = '/storage/' . $pathImage;
        } else {
            $publicPathImage = $dataValidated['old_image'];
        }

        // Получаем экземпляр модели Wishlist
        $wishlist = Wish::findOrFail($wish['id']);

        $wish->update([
            'title' => $dataValidated['title'],
            'price' => $dataValidated['price'],
            'user_id' => $user->id,
            'link_buy' => $dataValidated['link_buy'],
            'description' => $dataValidated['description'],
            'image' => $publicPathImage,
        ]);
    
        if (!empty($dataValidated['lists']))
        {
            // объединяем категории и желания (многие ко многим)
            $wish->lists()->sync($request->input('lists', []));
        }

        return redirect()->route('wishlist.index', $user->id)->with('success', 'Желание успешно обновлено!');
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

        return redirect()->route('wishlist.index', $user->id)->with('success', 'Желание исполнено!');
    }

    public function update_booking(User $user, Wish $wish, Request $request)
    {
        if ($request->input('wish_booking') == 'true')
        {
            $wish->update([
                'user_ip_booking' => request()->ip(),
                'date_booking' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->route('wishlist.index', $user->id)->with('success', 'Вы забронировали желание!');
        }    
    }

    public function booking_destroy(User $user, Wish $wish, Request $request)
    {
        if ($request->input('wish_booking_delete') == 'true')
        {
            $wish->update([
                'user_ip_booking' => NULL,
                'date_booking' => NULL,
            ]);

            return redirect()->route('wishlist.index', $user->id)->with('success', 'Вы сняли бронирование с этого желания!');
        }  
    }

    public function destroy(User $user, Wish $wish)
    {
        // Проверка прав доступа (пример)
        if ($wish->user_id !== $user->id) {
            abort(403);
        }

        // Удаление изображения вишлиста
        if ($wish->image) {
            // Преобразование URL в относительный путь
            $imagePath = str_replace('/storage/', '', $wish->image);
            
            // Удаление файла с публичного диска
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $wish->delete();

        return redirect()->route('wishlist.index', $user->id)->with('success', 'Желание успешно удалено!');
    }
}
