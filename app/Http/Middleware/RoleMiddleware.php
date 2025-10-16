<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Jika belum login
        if (!$user) {
            return redirect()->route('login');
        }

        // Jika role user tidak diizinkan
        if (!in_array($user->role, $roles)) {

            // Redirect ke dashboard sesuai role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard.index');
                case 'guru':
                    return redirect()->route('guru.blog.index');
                case 'siswa':
                    return redirect()->route('siswa.blog.index');
                default:
                    return redirect()->route('login')->with('error', 'Unauthorized access');
            }
        }

        // Jika role cocok, lanjutkan request
        return $next($request);
    }
}
