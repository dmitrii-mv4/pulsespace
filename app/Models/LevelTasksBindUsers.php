<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelTasksBindUsers extends Model
{
    protected $table = 'levelaccount_level_bind_tasks'; 
    protected $fillable = ['user_id', 'level_task_id', 'done'];

    public $timestamps = true;

    // обновляем кол-во желания пользователя
    public static function updateWishesCount(int $userId, int $wishesCount, int $levelTaskId): int
    {
        return self::where('user_id', $userId)
            ->where('levelaccount_level_task_id', $levelTaskId)
            ->update(['done' => $wishesCount]);
    }

    // обновляем кол-во рефералов пользователя
    public static function updateReferralsCount(int $userId, int $referralsCount, int $levelTaskId): int
    {
        return self::where('user_id', $userId)
            ->where('levelaccount_level_task_id', $levelTaskId)
            ->update(['done' => $referralsCount]);
    }

    // обновляем кол-во зарегистрированных дней пользователя
    public static function updateDaysRegisteredUserCount(int $userId, int $updateDaysRegisteredUserCount, int $levelTaskId): int
    {
        return self::where('user_id', $userId)
            ->where('levelaccount_level_task_id', $levelTaskId)
            ->update(['done' => $updateDaysRegisteredUserCount]);
    }
}
