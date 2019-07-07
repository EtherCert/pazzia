<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // before middleware
        $user = Auth::user(); // or $user = $request->user();
        if (!$user) {
            return route('login');
        }
        if (!$user->admin) {
            return  response('You are not admin');
        }
        return $next($request);

        //after middleware
        // $response = $next($request);
        // return response(strtoupper((string) $response));
    }
}
