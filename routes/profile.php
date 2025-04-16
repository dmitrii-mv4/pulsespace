<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\Level\UserLevelUpController;
use App\Http\Controllers\Level\LevelController;

// Route::prefix('profile')->group(function () 
// {
//     Route::match(['get'], '/user/{user}', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
// });


// Route::get('/users/{user}', function (User $user) {
//     return $user->email;
// });

Route::controller(UserController::class)->group(function () {

    Route::get('/', 'dashboard')->name('user.dashboard');

    Route::get('/user/{user}', 'user')->name('user.user');

    Route::get('/user/{user}/edit', 'edit')->middleware(['user_edit'])->name('user.edit');
    Route::patch('/user/{user}', 'update')->name('user.update');

    Route::get('/user/{user}/lv', 'level')->middleware(['email_verified'])->name('user.level');

    Route::get('/user/{user}/wishlist', 'wish')->middleware(['email_verified'])->name('user.wishlist.index');
    Route::get('/user/{user}/wishlist/list/{list}', 'wish_list')->middleware(['email_verified'])->name('user.wishlist.list');

    //Route::patch('/user/{user}/level/up', [UserLevelUpController::class, 'level_up_1'])->middleware(['email_verified'])->name('user.level.up');

    Route::patch('/user/{user}/level/up', [LevelController::class, 'level_up'])->middleware(['email_verified'])->name('user.level.up');
});
