<?php

namespace App\Http\Middleware;
use App\Traits\ApiResponser;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    use ApiResponser;

    public function handle($request, Closure $next, String $role) {
        if (Auth::user() !== null) {
            $roles = [
                'admin' => [1],
                'user' => [2],
            ];
            if(in_array(auth()->user()->role_id, $roles[$role]))
            return $next($request);

            //unauthorized
            return $this->error('You are not an admin', 403);
        }
        else{
            return $this->error('You are not logged in', 401);
        }
    }
}
