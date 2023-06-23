<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
     
        if($request->user() && $request->user()->role_id === 1){
            return $next($request);
        }
        Auth::logout();
        return redirect()->route('login');
        // abort(403,'Unauthorized');
    }
}
