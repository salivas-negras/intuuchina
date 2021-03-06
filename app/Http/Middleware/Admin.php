<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth as Auth;

class Admin
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
        if (!$this->isAdmin($request)) {
            return redirect('home');
        }

        return $next($request);
    }

    private function isAdmin($request) {
        if (!Auth::guest()) {
            if ($request->user()) {
                return $request->user()->type === 'admin' ? true : false;
            }
        }
    }
}
