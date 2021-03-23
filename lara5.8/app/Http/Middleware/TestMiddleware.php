<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
    if (now()->format('s') % 2) {
        return $next($request);
    } 
        return response('Revenez dans une seconde, je teste un middleware qui n\'affiche cette page que les secondes paires ! :D');
    
}
}
