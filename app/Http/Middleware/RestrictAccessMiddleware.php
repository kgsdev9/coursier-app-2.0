<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RestrictAccessMiddleware
{
    /**
     * pour communiquer avec la request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
           
            if (Auth::user()->role->nom !== 'admin')
            {
                return redirect()->route('home')->with('error', 'Accès refusé. Vous n\'avez pas les droits nécessaires.');
            }
        }
        return $next($request);
    }
}
