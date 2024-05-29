<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // cara 1 hardcode vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php
    // public function handle(Request $request, Closure $next, string $role): Response
    // {
    //     if ($role == 'admin' && auth()->user()->role_id != 1) {
    //         abort(403);
    //     }

    //     if ($role == 'author' && auth()->user()->role_id != 2) {
    //         abort(403);
    //     }

    //     if ($role == 'user' && auth()->user()->role_id != 3) {
    //         abort(403);
    //     }

    //     // Tambahkan Route Middleware Didalam Kernel Pada Path dibawah ini
    //     // Terutama jika clone dari github
    //     // vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php
    //     return $next($request);
    // }

    // cara 2
    // boostrap\app.php
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check() || Auth::user()->roles->slug !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
