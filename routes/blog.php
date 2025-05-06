<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\BlogController;

Route::controller(BlogController::class)->group(function () {

    // index
    Route::get('blog', 'index')->name('blog.index');

    // блог на профиле
    Route::get('user/{user}/blog', 'user_profile')->name('user.blog.profile');

    // create
    Route::get('blog/post/create', 'create')->name('blog.post.create');

    // store
    Route::post('blog/post/store', [BlogController::class, 'store'])->name('blog.post.store');

    // post
    Route::get('blog/post/{post}', 'post')->name('blog.post');

    // edit
    Route::get('blog/post/{post}/edit', [BlogController::class, 'edit'])->name('blog.post.edit');

    // update
    Route::put('blog/post/{post}', [BlogController::class, 'update'])->name('blog.post.update');

    // delete
    Route::delete('blog/post/{post}/delete', [BlogController::class, 'delete'])->name('blog.post.delete');
});