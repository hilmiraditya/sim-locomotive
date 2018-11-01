<?php

namespace App\Http\Middleware\CustomMiddleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class StaffMiddleware
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
        if(Auth::user()->admin == false)
        {
            return $next($request);
        }
        return redirect('/login');
    }
}
