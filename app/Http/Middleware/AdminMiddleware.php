<?php

namespace App\Http\Middleware;

//use Sentinel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. User should be authenticated
        // 2. Authenticated user should be Admin

        if(Sentinel::check() && Sentinel::getUser()->roles()
        ->first()->slug == 'admin')

        return $next($request);
            //Debug using log
        //     Log::info('role', ['role' => Sentinel::getUser()
        // ->roles()->first()]);

        else
            return redirect('/');
    }
}