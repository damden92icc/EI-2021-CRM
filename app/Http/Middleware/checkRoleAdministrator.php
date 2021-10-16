<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRoleAdministrator
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

        // 3 = role Admin
        if($user && $user->checkRole(3) ){

            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}
