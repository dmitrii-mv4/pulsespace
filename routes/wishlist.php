<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\WishController;
use App\Http\Controllers\WishListController;

Route::controller(WishController::class)->group(function () {

    // create
    Route::patch('user/{user}/wishlist/create', 'create')->name('user.wishlist.create');

    // update
    Route::patch('/user/{user}/wishlist/{wish}', [WishController::class, 'update'])->name('user.wishlist.update');

    // update done
    Route::patch('/user/{user}/wishlist/{wish}/done', [WishController::class, 'update_done'])->name('user.wishlist.update.done');

    // delete
    Route::delete('/user/{user}/wishlist/{wish}', [WishController::class, 'destroy'])->name('user.wishlist.destroy');
});

Route::controller(WishListController::class)->group(function () {

    // create
    Route::patch('user/{user}/wishlist/list/create', 'create')->name('user.wishlist.list.create');

    // update
    Route::patch('/user/{user}/wishlist/list/{list}', 'update')->name('user.wishlist.list.update');
});