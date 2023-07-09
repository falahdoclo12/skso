<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            //redirect or abort if the user is not authenticated
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!$user->is_admin && $role === 'admin') {
            //redirect or abort if the user is not an admin
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
