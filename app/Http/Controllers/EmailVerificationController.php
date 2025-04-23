<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
    |--------------------------------------------------------------------------
    | Контроллер для отправки ссылки на email на подтверждение аккаунта
    |--------------------------------------------------------------------------
*/

class EmailVerificationController extends Controller
{
    // Отправка письма с ссылкой подтверждения
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/lk/user/'.auth()->user()->id);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Ссылка для подтверждения отправлена!');
    }

    // Обработка перехода по ссылке
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/lk/user/'.auth()->user()->id)->with('status', 'Email успешно подтверждён!');
    }
}
