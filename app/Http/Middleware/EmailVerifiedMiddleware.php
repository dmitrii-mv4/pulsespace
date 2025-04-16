<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\UserLevelUpController;

class EmailVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     * Проверка поддтверждения почты, если почта поддтверждена то пропускаем и меняем уровень аккаунта на 1
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Если уровень аккаунта пользователя не NULL то пропускаем
        if (auth()->user()->email_verified_at != NULL)
        {
            return $next($request);
        }

        abort(403);
    }
}