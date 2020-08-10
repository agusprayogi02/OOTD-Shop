<?php

namespace App\Http\Middleware;

use Closure;

class IsMember
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
        if (auth()->user()->role == "member") {
            return $next($request);
        }
        return redirect()->route('home')->with('error', "You don't have Member access.");
    }
}
