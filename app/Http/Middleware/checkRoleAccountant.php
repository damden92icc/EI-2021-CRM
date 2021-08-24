<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRoleAccountant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
             
        $user = $request->user();

        if($user && $user->checkRole(4) ){

            return $next($request);
        }
        return redirect()->route('home');
    }
}
