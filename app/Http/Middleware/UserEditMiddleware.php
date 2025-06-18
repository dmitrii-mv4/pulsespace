<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\UserLevelUpController;

class UserEditMiddleware
{
    /**
     * Handle an incoming request.
     * Проверка поддтверждения почты, если почта поддтверждена то пропускаем и меняем уровень аккаунта на 1
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // получаем пользователя
        $userFromRoute = $request->route('user');

        if(auth()->check() == true)
        {
            // пользователь может редактированать только свои данные
            if (empty($userFromRoute['id']))
            {
                if (auth()->user()->id == $userFromRoute)
                {
                    return $next($request);
                }

            } else {

                if (auth()->user()->id == $userFromRoute['id'])
                {
                    return $next($request);
                }
            }

            abort(403);
        }
        
        return redirect()->guest('login');
    }
}