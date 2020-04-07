<?php

namespace App\Http\Middleware;

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
        switch ($guard) {
            case 'teacher':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('teacher-profile.index');
                }
                break;
            
            case 'student':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('student-profile.index');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('c-panel');
                }
                break;
        }


        

        return $next($request);
    }
}
