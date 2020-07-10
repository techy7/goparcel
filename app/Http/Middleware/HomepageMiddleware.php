<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HomepageMiddleware
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
        if (auth()->user()->hasRole('Super Admin')) 
        {
            return redirect()->route('admin.dashboard');
        } 
        elseif (auth()->user()->hasRole('User')) 
        {
            return redirect()->route('admin.dashboard');
        } 
        elseif (auth()->user()->hasRole('Customer')) 
        {
            return redirect()->route('customer.dashboard');
        }
    }
}
