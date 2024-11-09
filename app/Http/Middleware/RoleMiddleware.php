<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            Cache::put('error', 'Silakan login untuk mengakses halaman ini', now()->addSeconds(5));
            return redirect()->route('login');
        }

        if (Auth::user()->role !== $role) {
            Cache::put('error', 'Anda tidak memiliki akses ke halaman ini', now()->addSeconds(5));
            return redirect()->route('home'); // Atau halaman lain yang sesuai
        }

        return $next($request);
    }
}
