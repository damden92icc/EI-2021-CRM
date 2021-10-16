<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRoleManager
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

        if($user && $user->checkRole(2) ){
            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}
