<?php

namespace App\Http\Controllers;

use App;
use App\Models\User;
use App\Models\Role;
use App\Models\WishList;
use App\Models\Wish;
use App\Models\City;
use App\Models\Citation;
use App\Models\UsersReferral;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\UserUpdateRequest;
use App\Providers\DailyRandomService;
use Illuminate\Container\Attributes\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $service = new DailyRandomService(Citation::query());
        $citation = $service->getDailyRandom();

        // Создаём реферальную ссылку
        $userReferralTable = UsersReferral::where('user_id', auth()->user()->id)->first();
        $userReferralLink = Request::root() . '/register/?referral=' . $userReferralTable->code;

        //$citations = Citation::All();

        return view('user/dashboard', compact('citation', 'userReferralLink'));
    }

    public function user(User $user)
    {
        $role = Role::find($user['role_id']);
        $city = City::find($user['city_id']);

        // Создаём реферальную ссылку
        $userReferralTable = UsersReferral::where('user_id', $user->id)->first();
        $userReferralLink = Request::root() . '/register/?referral=' . $userReferralTable->code;

        return view('user/user', compact('user', 'role', 'city', 'userReferralLink'));
    }

    // Редактирование пользователя
    public function edit(User $user)
    {
        $role = Role::find($user['role_id']);
        $city = City::find($user['city_id']);

        $citys = City::All();

        return view('user/edit', compact('user', 'role', 'city', 'citys'));
    }

    // Обновление данных
    public function update(UserUpdateRequest $request)
    {
        //dd($request->all());

        $dataValidated = $request->validated();

        // Если аватар загружен
        if ($request->hasFile('avatar'))
        {
            $fileAvatar = $request->file('avatar');

            // Удаляем старый аватар
            if (!empty($dataValidated['old_avatar'])) {
                $oldAvatarPath = str_replace('/storage/', '', $dataValidated['old_avatar']);
                if (Storage::disk('public')->exists($oldAvatarPath)) {
                    Storage::disk('public')->delete($oldAvatarPath);
                }
            }

            // Генерируем уникальное имя
            $newNameAvatar = now()->format('Y-m-d_His') . '.' . $fileAvatar->extension();

            // Сохраняем в public/users/avatar
            $pathAvatar = $fileAvatar->storeAs('users/avatar', $newNameAvatar, 'public');
            $publicPathAvatar = '/storage/' . $pathAvatar;
        } else {
            $publicPathAvatar = $dataValidated['old_avatar'];
        }

        // Если обложка загружена
        if ($request->hasFile('cover'))
        {
           $fileCover = $request->file('cover');

            // Удаляем старую обложку
            if (!empty($dataValidated['old_cover'])) {
                $oldCoverPath = str_replace('/storage/', '', $dataValidated['old_cover']);
                if (Storage::disk('public')->exists($oldCoverPath)) {
                    Storage::disk('public')->delete($oldCoverPath);
                }
            }

            // Генерируем уникальное имя
            $newNameCover = now()->format('Y-m-d_His') . '.' . $fileCover->extension();

            // Сохраняем в public/users/cover
            $pathCover = $fileCover->storeAs('users/cover', $newNameCover, 'public');
            $publicPathCover = '/storage/' . $pathCover;
        } else {
            $publicPathCover = $dataValidated['old_cover'];
        }

        // Обновляем данные в БД
        User::where('id', '=', $dataValidated['id'])
            ->update([
                //'email' => $dataValidated['email'],
                'role_id' => 2,
                'tariff' => 'simple',
                'name' => $dataValidated['name'],
                'surname' => $dataValidated['surname'],
                'gender' => $dataValidated['gender'],
                'city_id' => $dataValidated['city_id'],
                'date_of_birth' => $dataValidated['date_of_birth'],
                'avatar' => $publicPathAvatar,
                'cover' => $publicPathCover,
                'phone' => $dataValidated['phone'],
                'service_theme' => $dataValidated['service_theme'],
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

        return redirect()->route('user.user', $dataValidated['id'])->with('success', 'Ваш профиль обновлён!');
    }

    // Повторная отправка письма на потдверждение Email
    public function resendVerification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Письмо подтверждения отправлено!');
    }

    // выводим собственные посты
    public function blog_post(User $user)
    {
        return view('user/blog/index', compact('user'));
    }
}
