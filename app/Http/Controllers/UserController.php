<?php

namespace App\Http\Controllers;

use App;
use App\Models\User;
use App\Models\Role;
use App\Models\Level;
use App\Models\LevelTasks;
use App\Models\LevelTasksBindUsers;
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

        $level = Level::find(auth()->user()->level_id);

        return view('user/dashboard', compact('citation', 'level', 'userReferralLink'));
    }

    public function user(User $user)
    {
        $role = Role::find($user['role_id']);
        $level = Level::find($user['level_id']);
        $city = City::find($user['city_id']);

        // Создаём реферальную ссылку
        $userReferralTable = UsersReferral::where('user_id', $user->id)->first();
        $userReferralLink = Request::root() . '/register/?referral=' . $userReferralTable->code;

        return view('user/user', compact('user', 'role', 'level', 'city', 'userReferralLink'));
    }

    // Редактирование пользователя
    public function edit(User $user)
    {
        $role = Role::find($user['role_id']);
        $level = Level::find($user['level_id']);
        $city = City::find($user['city_id']);

        $citys = City::All();

        return view('user/edit', compact('user', 'role', 'level', 'city', 'citys'));
    }

    // Обновление данных
    public function update(UserUpdateRequest $request)
    {
        //dd($request->all());

        $dataValidated = $request->validated();

        // Если фото загружено
        if (!empty(request()->file('avatar')))
        {
            // Проверяем есть ли старый путь к аватару в БД
            if (!empty($dataValidated['avatar']))
            {
                $nameAvatarOld = explode('/', $dataValidated['old_avatar']);

                //dd($nameAvatarOld);

                if (!empty($nameAvatarOld[5]))
                {
                    if (file_exists('storage/images/users/avatar/' . $nameAvatarOld[5])) {
                        unlink('storage/images/users/avatar/' . $nameAvatarOld[5]);
                    }
                }
            }

            // Получаем файл изображения
            $fileAvatar = request()->file('avatar');

            // Генерируем новое имя файла на основе текущей даты/времени
            $newNameAvatar = now()->format('Y-m-d_His') . '.' . $fileAvatar->getClientOriginalExtension();

            // Сохраняем файл с новым именем
            $pathAvatar = $fileAvatar->storeAs('public/images/users/avatar', $newNameAvatar);

            // Для доступа через web:
            //$publicPathAvatar = Storage::url($pathAvatar);

            // Загружаем фото на диск users
            $PathAvatar = Storage::disk('users')->putFileAs(
                'avatar',       // папка
                $fileAvatar,    // файл 
                $newNameAvatar  // название файла
            );

            $PathAvatar = '/storage/images/users/avatar/'.$newNameAvatar;

        } else {
            $PathAvatar = $dataValidated['old_avatar'];
        }

        // Если обложка загружена
        if (!empty(request()->file('cover')))
        {
            // Проверяем есть ли старый путь к аватару в БД
            if (!empty($dataValidated['cover']))
            {
                //dd($dataValidated);

                $nameCoverOld = explode('/', $dataValidated['old_cover']);

                if (!empty($nameCoverOld[5]))
                {
                    if (file_exists('storage/images/users/cover/' . $nameCoverOld[5])) {
                        unlink('storage/images/users/cover/' . $nameCoverOld[5]);
                    }
                }
            }

            // Получаем файл изображения
            $fileCover = request()->file('cover');

            // Генерируем новое имя файла на основе текущей даты/времени
            $newNameCover = now()->format('Y-m-d_His') . '.' . $fileCover->getClientOriginalExtension();

            // Сохраняем файл с новым именем
            $pathCover = $fileCover->storeAs('public/images/users/cover', $newNameCover);

            // Для доступа через web:
            //$publicPathAvatar = Storage::url($pathAvatar);

            // Загружаем фото на диск users
            $pathCover = Storage::disk('users')->putFileAs(
                'cover',       // папка
                $fileCover,    // файл 
                $newNameCover  // название файла
            );

            $PathCover = '/storage/images/users/cover/'.$newNameCover;

        } else {
            $PathCover = $dataValidated['old_cover'];
        }

        // Обновляем данные в БД
        User::where('id', '=', $dataValidated['id'])
            ->update([
                //'email' => $dataValidated['email'],
                'role_id' => 1,
                'tariff_id' => 1,
                'level_id' => 1,
                'name' => $dataValidated['name'],
                'surname' => $dataValidated['surname'],
                'gender' => $dataValidated['gender'],
                'city_id' => $dataValidated['city_id'],
                'date_of_birth' => $dataValidated['date_of_birth'],
                'avatar' => $PathAvatar,
                'cover' => $PathCover,
                'phone' => $dataValidated['phone'],
                'service_theme' => $dataValidated['service_theme'],
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

        return redirect()->route('user.user', $dataValidated['id'])->with('success', 'Ваш профиль обновлён!');
    }

    public function level(User $user)
    {
        $user_id = User::find($user->id);

        // выводим текущие задачи пользователя по уровню
        $level_tasks = $user_id->user_level_tasks;

        // текущие задачи пользователя из таблицы level_bind_tasks с complition
        // $user_level_bind_tasks = $user->level_tasks;

        // dd($user_level_bind_tasks);

        // Получаем все задачи уровня пользователя и их прогресс
        $user_level_bind_tasks = DB::table('levelaccount_level_bind_tasks')
            ->where('levelaccount_level_bind_tasks.level_id', $user->level_id)
            ->join('levelaccount_level_tasks', 'levelaccount_level_bind_tasks.level_task_id', '=', 'levelaccount_level_tasks.id')
            ->leftJoin('levelaccount_level_tasks_bind_users', function($join) use ($user) {
                $join->on('levelaccount_level_bind_tasks.level_task_id', '=', 'levelaccount_level_tasks_bind_users.level_task_id')
                    ->where('levelaccount_level_tasks_bind_users.user_id', $user->id);
                })
            ->select(
                'levelaccount_level_tasks.title',
                'levelaccount_level_bind_tasks.completion',
                DB::raw('COALESCE(levelaccount_level_tasks_bind_users.done, 0) as done')
            )
            ->get();

        // выводим данные о текущем уровне аккаунта
        $level = Level::find($user['level_id']);

        // выводим задачи текущего уровня + completion (кол-во выполнения)
        // $level_tasks_completion = $level->level_tasks;

        // роль пользователя
        $role = Role::find($user['role_id']);

        // вызываем контроллер который обрабатывает уровни
        $success_next_lv = app()->call('\App\Http\Controllers\Level\LevelController@level_check', [
            'level_tasks' => $level_tasks,
            'user' => $user,
            'level' => $level
        ]);

        // определяем доступна ли кнопка след. уровня
        //$btn_success_next_lv = $success_next_lv[0];

        // определяем текущий вид
        //$view = $success_next_lv[1];
        
        //dd($level->rewards);

        return view('user/level', compact('user', 'level', 'role', 'success_next_lv', 'user_level_bind_tasks'));
    }

    public function wish(User $user)
    {
        $role = Role::find($user['role_id']);

        // выводим все категории wishlist текущего пользователя
        $lists = WishList::where('user_id', $user['id'])->get();

        // выводим все желания текущего пользователя
        $wishes = Wish::where('user_id', $user['id'])->get();

        // выводим кол-во всех желаний
        $wishes_count = Wish::where('user_id', $user['id'])->count();

        return view('wishlist/index', compact('user', 'role', 'lists', 'wishes', 'wishes_count'));
    }

    public function wish_list(User $user, WishList $list)
    {
        $role = Role::find($user['role_id']);

        // выводим все категории wishlist текущего пользователя
        $lists = WishList::where('user_id', $user['id'])->get();

        // Желания текущего списка + проверка принадлежности пользователю
        $wishes = $list->wishes()
            ->where('user_id', $user->id)
            ->whereNull('wisheslist_wish_join_lists.deleted_at')
            ->get();

        // выводим кол-во всех желаний
        $wishes_count = Wish::where('user_id', $user['id'])->count();

        return view('wishlist/list', compact('user', 'role', 'lists', 'list', 'wishes', 'wishes_count'));
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
