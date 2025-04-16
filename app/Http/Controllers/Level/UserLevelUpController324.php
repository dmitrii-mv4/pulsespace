<?php

namespace App\Http\Controllers\Level;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\LevelTasks;
use App\Models\LevelTasksBindUsers;
use Illuminate\Support\Facades\DB;

class UserLevelUpController extends Controller
{
    public function level_up_1()
    {
        // вытаскиваем текущего пользователя из БД
        $user_id = User::find(auth()->user()->id);

        // выводим текущие задачи пользователя текущего уровня
        $level_tasks = $user_id->user_level_tasks;

            // проверяем если в БД задание отмечено как не выполнено - то меняем на выполнено, так как почта подтверждена
            // Этот код надо переместить в место где будет подтверждаться почта
            // if ($level_tasks[0]->pivot->done == 0)
            // {
            //     LevelTasksBindUsers::where('user_id', auth()->id())
            //         ->where('level_task_id', 1)
            //         ->update(['done' => 1]);
            // }

            // проверяем, что задание действительно выполнено
            if ($level_tasks[0]->pivot->done >= 3 && $level_tasks[1]->pivot->done >= 1)
            {
                // проверяем id уровеня аккаунта, он должен быть 1
                if (auth()->user()->level_id == 1)
                {
                    // создам новые задачи для уровня 2
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

                    // Обновляем id уровня аккаунта на 2 у текущего пользователя
                    User::where('id', '=', auth()->user()->id)
                        ->update(['level_id' => 2]);
                }
            }            
        

        return redirect()->route('user.level', auth()->user()->id);
    }
}