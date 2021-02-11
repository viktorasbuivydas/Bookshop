<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\CheckRole as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
class CheckRole
{
    public function handle($request, Closure $next, String $role) {
        if (Auth::user() !== null) {
            $roles = [
                'admin' => [1],
                'user' => [2],
            ];
            if(in_array(auth()->user()->role_id, $roles[$role]))
            return $next($request);
        
            return redirect('/home');
        }
        else{
            return redirect('/login');
        }
    }
}
