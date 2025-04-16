<?php

namespace App\Services;

use App\Models\User;
use App\Models\LevelTasksBindUsers;

class UserService
{
    public function getReferralsCount($user)
    {
        // выводим текущее кол-во
        $count = $user->referrals()->count();

        // обновляем данные
        LevelTasksBindUsers::updateReferralsCount($user->id, $count, 2);
        return $count;
    }

    public function getDaysRegisteredUserCount($user)
    {
        // вычисляем сколько пользователь дней на портале
        $daysRegistered = $user->created_at->diffInDays(now());
        $daysRegistered = floor($daysRegistered); // округление

        // обновляем данные
        LevelTasksBindUsers::updateDaysRegisteredUserCount($user->id, $daysRegistered, 3);
        return $daysRegistered;
    }
}