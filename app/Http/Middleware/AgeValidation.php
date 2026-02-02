<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age = session()->get('age');
        
        if ($age >= 18 && is_numeric($age)) {
            return $next($request);
        }
        dd('Age middleware', session('age'));
        return new Response('Access denied. You must be at least 18 years old to access this page.', 403);
    }
}