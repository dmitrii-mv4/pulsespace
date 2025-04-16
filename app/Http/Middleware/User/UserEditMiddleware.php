<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserEditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() == false)
        {
            return redirect()->guest('login');
        }

        $url_pach = \Request::getRequestUri();
        $url_pach = explode('/', $url_pach);


        if (Auth::user()->role_id == 1 )
        {
            return $next($request);
        }

        if ($url_pach[3] == Auth::user()->id)
        {
            
            return $next($request);
        }   

        abort(403);
    }
}
