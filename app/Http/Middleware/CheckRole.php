<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->id == 1) {
            return $next($request);
        }

        // if (!$request->user()->perfil->secciones()->where('nombre', $role)->first()) {
        //     return redirect()->route('home');
        // }

        return $next($request);
    }
}
