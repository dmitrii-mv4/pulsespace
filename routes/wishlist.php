<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\WishController;
use App\Http\Controllers\WishListController;

Route::controller(WishController::class)->group(function () {

    Route::get('/user/{user}/wishlist', [UserController::class, 'wish'])->name('wishlist.index');

    // create
    Route::patch('/user/{user}/wishlist/create', 'create')->middleware('auth')->name('wishlist.create');

    // update
    Route::patch('/user/{user}/wishlist/{wish}', [WishController::class, 'update'])->middleware('auth')->name('wishlist.update');

    // update done
    Route::patch('/user/{user}/wishlist/{wish}/done', [WishController::class, 'update_done'])->middleware('auth')->name('wishlist.update.done');

    // update booking
    Route::patch('/user/{user}/wishlist/{wish}/booking', [WishController::class, 'update_booking'])->name('wishlist.update.booking');

    // delete booking
    Route::patch('/user/{user}/wishlist/{wish}/booking/delete', [WishController::class, 'booking_destroy'])->name('wishlist.booking.destroy');

    // delete
    Route::delete('/user/{user}/wishlist/{wish}', [WishController::class, 'destroy'])->middleware('auth')->name('wishlist.destroy');
});

Route::controller(WishListController::class)->group(function () {

    Route::get('/user/{user}/wishlist/list/{list}', [UserController::class, 'wish_list'])->name('wishlist.list');

    // create
    Route::patch('user/{user}/wishlist/list/create', 'create')->middleware('auth')->name('wishlist.list.create');

    // update
    Route::patch('/user/{user}/wishlist/list/{list}', 'update')->middleware('auth')->name('wishlist.list.update');
});