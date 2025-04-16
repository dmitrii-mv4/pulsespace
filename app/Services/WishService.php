<?php

namespace App\Services;

use App\Models\Wish;
use App\Models\LevelTasksBindUsers;

class WishService
{
    public function getWishesCount($user)
    {
        // выводим текущее кол-во
        $count = Wish::where('user_id', $user->id)->count();

        // обновляем данные
        LevelTasksBindUsers::updateWishesCount($user->id, $count, 1);
        return $count;
    }
}