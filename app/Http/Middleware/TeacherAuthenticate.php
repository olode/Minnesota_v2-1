<?php

namespace App\Http\Middleware;

use Closure;

class TeacherAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $teachersession = request()->session()->get("TeacherData");

            if ($teachersession == null) {
                return redirect('login-teacher-portal');           
            }
        
        return $next($request);
    }
}
