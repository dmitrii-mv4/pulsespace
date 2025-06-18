<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\Level\UserLevelUpController;
use App\Http\Controllers\Level\LevelController;

Route::controller(UserController::class)->group(function () {
    Route::get('/user/{user}', 'user')->name('user.user');
    Route::get('/user/{user}/edit', 'edit')->middleware('user_edit')->name('user.edit');
    Route::patch('/user/{user}', 'update')->middleware('user_edit')->name('user.update');
});
