<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Checkage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $min = 0, $max = 40) // $age new para
    {
        //before middleware 
        $user = Auth::user(); // or $user = $request->user();
        $now = now();
        $years =  $now->floatDiffInYears($user->birthday);

        if (!$user) {
            return route('login');
            //or return redirect()->route('login');
        }
        if ($years < $min || $years > $max) {
            return  response('Under Age');
        }
        return $next($request);
    }
}
