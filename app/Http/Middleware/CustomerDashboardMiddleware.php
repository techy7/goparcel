<?php

namespace App\Http\Middleware;

use Closure;

class CustomerDashboardMiddleware
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
        $authUsername = auth()->user()->username;
        $requestUsername = request()->route('username');

        if ($requestUsername == $authUsername) {
            return $next($request);
        }
            return redirect('/admin/dashboard');
    }
}
