<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReferralController;


Route::controller(ReferralController::class)->group(function () {

    Route::get('/refferal', 'index')->name('refferal.index');

});