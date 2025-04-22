<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    // Отправка письма с ссылкой подтверждения
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Ссылка для подтверждения отправлена!');
    }

    // Обработка перехода по ссылке
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/')->with('status', 'Email успешно подтверждён!');
    }
}
