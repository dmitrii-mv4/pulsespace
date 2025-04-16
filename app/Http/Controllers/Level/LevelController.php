<?php

namespace App\Http\Controllers\Level;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WishListController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\LevelTasks;
use App\Models\LevelTasksBindUsers;
use App\Models\Wish;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\WishService;
use App\Services\UserService;

class LevelController extends Controller
{
    protected $wishService;
    protected $userService;

    // Инъекция зависимостей через конструктор
    public function __construct(WishService $wishService, UserService $userService)
    {
        $this->wishService = $wishService;
        $this->userService = $userService;
    }

    public function level_up(Request $request)
    {
        $user_id = $request->input('user_id');

        // вытаскиваем текущего пользователя из БД
        $user = User::find($user_id);

        // выводим текущие задачи пользователя текущего уровня
        $level_tasks = $user->user_level_tasks;

        // выводим данные о текущем уровне аккаунта
        $level = Level::find($user->level_id);

        $this->level_check($level_tasks, $user, $level);

        return redirect()->route('user.level', $user_id);
    }

    public function level_check($level_tasks, $user, $level)
    {
        // передаются из котроллера: UserController и метода: level
        // $level_tasks - выводим текущие задачи пользователя по уровню
        // $user - выводим текущего пользователя на чьей странице
        // $level - выводим данные о текущем уровне аккаунта

        $success_next_lv = False;

        // проверяем, что задание действительно выполнено
        switch ($level->id)
        {
            case '1':
                $success_next_lv = $this->level_1($level_tasks, $user);
                break;

            case '2':
                $success_next_lv = $this->level_2($level_tasks, $user);
                break;

            default:
                # code...
                break;
        }

        // if ($success_next_lv == true)
        // {
        //     return 'true';
        //     // Обновляем id уровня аккаунта у текущего пользователя
        //     // User::where('id', '=', auth()->user()->id)
        //     //     ->update(['level_id' => $success_next_lv['success_active_lv'] + 1]);
        // } 

        //return redirect()->route('user.level', $user->id);
        return $success_next_lv;
    }

    // public function main($level_tasks, $user, $level)
    // {
    //     // $level_tasks - выводим текущие задачи пользователя по уровню
    //     // $user - выводим текущего пользователя на чьей странице
    //     // $level - выводим данные о текущем уровне аккаунта

    //     $success_next_lv = False;

    //     switch ($level->id) {
    //         case '1':
    //             $success_next_lv = $this->level_1($level_tasks, $user);
    //             break;

    //         case '2':
    //             $success_next_lv = $this->level_2($level_tasks, $user);
    //             break;

    //         case '2':
    //             $success_next_lv = $this->level_3($level_tasks, $user);
    //             break;
            
    //         default:
    //             # code...
    //             break;
    //     }

    //     // переписываем ключи в массиве для понимания
    //     $success_next_lv = array(
    //         'success_btn' => $success_next_lv[0],
    //         'active_lv' => $success_next_lv[1]
    //     );

    //     return $success_next_lv;
    // }

    public function level_1($level_tasks, $user)
    {
        // выводим общее кол-во желаний
        $wishesCount = $this->wishService->getWishesCount($user);

        // выводим кол-во рефералов у пользователя 
        $referralsCount = $this->userService->getReferralsCount($user);

        // проверяем условия выполнения, если все действия выполнены, то активируем кнопку перехода на след. уровень
        if (
            $level_tasks[0]->pivot->done >= 3 // 3 желания
            && 
            $level_tasks[1]->pivot->done >= 1 // пригласить 1 друга
            )
        {
            // создадим новые задачи для уровня 2
            $data = [
                'level_task_id' => [3] // ID задач уровня
            ];
    
            foreach ($data['level_task_id'] as $taskId) 
            {
                LevelTasksBindUsers::create([
                    'user_id' => auth()->user()->id,
                    'level_task_id' => $taskId,
                    'done' => 0
                ]);
            }

            // Обновляем id уровня аккаунта у текущего пользователя
            User::where('id', '=', auth()->user()->id)
                ->update(['level_id' => 2]);

            $next_lv = True;

        } else {
            $next_lv = False;
        }

        $active_lv = 1;

        return ['next_lv' => $next_lv, 'active_lv' => $active_lv];
    }

    public function level_2($level_tasks, $user)
    {
        // выводим общее кол-во желаний
        $wishesCount = $this->wishService->getWishesCount($user);

        // выводим кол-во рефералов у пользователя 
        $referralsCount = $this->userService->getReferralsCount($user);

        // выводим кол-во рефералов у пользователя 
        $daysRegisteredCount = $this->userService->getDaysRegisteredUserCount($user);

        // проверяем условия выполнения, если все действия выполнены, то активируем кнопку перехода на след. уровень
        if (
            $level_tasks[1]->pivot->done >= 3 // пригласить 3 друзей
            && 
            $level_tasks[2]->pivot->done >= 7 // Кол-во дней зарегистрированным на портале: 7
            )
        {

            $next_lv = True; 

        } else {
            $next_lv = False;
        }

        $active_lv = 2;

        return ['next_lv' => $next_lv, 'active_lv' => $active_lv];
    }

    public function level_3($level_tasks, $user)
    {
        //
    }
}