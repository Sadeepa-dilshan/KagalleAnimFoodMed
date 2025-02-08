<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Convert comma-separated string to array if necessary
        $allowedRoles = collect($roles)->flatMap(function ($role) {
            return explode(',', $role);
        })->toArray();

        // Check if user's role is in the allowed roles array
        if (!in_array($request->user()->role, $allowedRoles)) {
            // Redirect based on user's actual role
            switch ($request->user()->role) {
                case 'admin':
                    return redirect('admin/dashboard');
                default:
                    return redirect('dashboard');
            }
        }
        return $next($request);
    }
}