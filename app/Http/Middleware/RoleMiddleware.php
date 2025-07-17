<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        
        if ($role == 'admin' && $user->idrole != 1) {
            return abort(403, 'Akses hanya untuk admin.');
        }

        if ($role == 'mahasiswa' && $user->idrole != 2) {
            return abort(403, 'Akses hanya untuk mahasiswa.');
        }

        if ($role == 'dosen' && $user->idrole != 3) {
            return abort(403, 'Akses hanya untuk dosen.');
        }

        return $next($request);
    }
}
