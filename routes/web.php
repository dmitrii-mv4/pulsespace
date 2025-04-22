<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\EmailVerificationController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('auth.logout');

Route::prefix('lk')->middleware(['auth'])->group(function () {

    require_once 'profile.php';

    require_once 'wishlist.php';

    Route::prefix('taskmanager')->group(function () {
        require_once 'task_manager.php';
    });

});

Route::prefix('lk')->middleware(['auth'])->group(function () {
    require_once 'refferal.php';
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware(['track_referral_clicks'])->name('register');

// Отправка письма с подтверждением
Route::post('/email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])
    ->middleware(['auth'])
    ->name('verification.send');

// Обработка перехода по ссылке подтверждения
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
    
// Есть запрос на profile
// $url_profile = explode('/', URL::current());

// $url_profile_result = in_array($url_profile[3]);

// dd($url_profile_result);



// if (in_array($url_profile[3] == 'profile'))
// {
//     require_once 'profile.php';    
// }

//Route::get('profile/{user}', 'App\Http\Controllers\ProfileController@index')->name('profile.index');