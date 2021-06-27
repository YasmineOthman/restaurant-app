<?php

namespace App\Http\Middleware;

use App\Models\Restaurant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, Restaurant $restaurant)
    {
        if ((Auth::check() && Auth::user()->name === $restaurant->name) || Auth::user()->role_id)
            return $next($request);

        else
            return redirect('/')->with('status', 'you are not login in ');
    }
}
