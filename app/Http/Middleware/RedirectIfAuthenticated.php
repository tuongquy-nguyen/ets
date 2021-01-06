<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role_id;
            switch ($role) {
                case 2:
                    return redirect(route('dashboard'));
                    break;
                case 1:
                    return redirect(route('teacher.index'));
                    break;
                case 0:
                    return redirect(route('home-student'));
                    break;
                default:
                    return redirect(route('home'));
                    break;
            }
        }


        return $next($request);
    }
}
