<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\WishController;
use App\Http\Controllers\WishListController;

Route::controller(WishController::class)->group(function () {

    Route::get('/user/{user}/wishlist', 'index')->name('wishlist.index');

    // create
    Route::patch('/user/{user}/wishlist/create', 'create')->middleware('user_edit')->name('wishlist.create');

    // update
    Route::patch('/user/{user}/wishlist/{wish}', [WishController::class, 'update'])->middleware('user_edit')->name('wishlist.update');

    // update done
    Route::patch('/user/{user}/wishlist/{wish}/done', [WishController::class, 'update_done'])->middleware('user_edit')->name('wishlist.update.done');

    // update booking
    Route::patch('/user/{user}/wishlist/{wish}/booking', [WishController::class, 'update_booking'])->name('wishlist.update.booking');

    // delete booking
    Route::patch('/user/{user}/wishlist/{wish}/booking/delete', [WishController::class, 'booking_destroy'])->name('wishlist.booking.destroy');

    // delete
    Route::delete('/user/{user}/wishlist/{wish}', [WishController::class, 'destroy'])->middleware('user_edit')->name('wishlist.destroy');
});

Route::controller(WishListController::class)->group(function () {

    Route::get('/user/{user}/wishlist/list/{list}', 'index')->name('wishlist.list');

    // create
    Route::patch('user/{user}/wishlist/list/create', 'create')->middleware('user_edit')->name('wishlist.list.create');

    // update
    Route::patch('/user/{user}/wishlist/list/{list}', 'update')->middleware('user_edit')->name('wishlist.list.update');

    // delete
    Route::delete('/user/{user}/wishlist/list/{list}', 'destroy')->middleware('user_edit')->name('wishlist.list.destroy');
});