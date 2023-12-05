<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pengguna; // Pastikan model Pengguna diimpor

class PengajarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Pastikan pengguna terautentikasi dan memiliki peran
        if ($user) {
            $userRoles = $user->roles->pluck('name')->toArray();

            // Periksa apakah peran "admin" ada dalam daftar peran pengguna
            if (in_array('Pengajar', $userRoles)) {
                return $next($request);
            }
        }

        // return redirect()->route('admin');

        // Tangani ketika pengguna tidak memiliki peran "admin"
        abort(403, 'Unauthorized');
    }
}
