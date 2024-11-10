<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class shopAdmin
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
        if(auth()->check() && auth()->user()->is_admin == 1){
            return $next($request);
        }else{
            // Redirect non-logged-in users to the login page
            return redirect()->route('login')->with('error','Unauthoeized access. Please log in user');
        }
        
    }
}
