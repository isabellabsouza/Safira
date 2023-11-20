<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {        
        $user = auth()->user();

        //dd($user->role);
        if ($user->role == 'admin') {
            return $next($request);
        }

    
    
        abort(403, 'Ação não autorizada.');
    }
}
