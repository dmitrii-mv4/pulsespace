<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\EmailVerificationController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

/*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | auth - только авторизовынный
    | verify - с проверенным email
    | 
    |
*/

Auth::routes(['verify' => true]);

// Главная страница
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('auth.logout');

    require_once 'profile.php';

    require_once 'wishlist.php';

    require_once 'refferal.php';


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware(['track_referral_clicks'])->name('register');

// Переадрисация письма с ссылкой подтверждения email

    // Отправка письма с подтверждением
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])
        ->middleware(['auth'])
        ->name('verification.send');

    // Обработка перехода по ссылке подтверждения
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');
