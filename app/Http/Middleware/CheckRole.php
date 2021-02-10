<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\CheckRole as Middleware;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, String $role) {
       
        $user = Auth::user();
        $roles = [
            'admin' => [1],
            'user' => [2],
        ];
        if(in_array(auth()->user()->role_id, $roles[$role]))
          return $next($request);
    
        return redirect('/home');
    }
}
