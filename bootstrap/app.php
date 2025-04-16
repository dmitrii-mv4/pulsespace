<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AdminRole;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\User\UserEditMiddleware;
use App\Http\Middleware\EmailVerifiedMiddleware;
use App\Http\Middleware\TrackReferralClicks;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminRole::class,
            'auth' => Authenticate::class,
            'user_edit' => UserEditMiddleware::class,
            'email_verified' => EmailVerifiedMiddleware::class,
            'track_referral_clicks' => TrackReferralClicks::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
