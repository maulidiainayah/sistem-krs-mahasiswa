<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman register
     */
    public function create(): View
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.register', compact('roles'));
    }

    /**
     * Menangani pendaftaran user baru
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,dosen,mahasiswa'], // Tambahkan "dosen"
        ]);

        // Konversi role ke angka sesuai sistem kamu
        $roleId = match ($request->role) {
            'admin' => 1,
            'dosen' => 2,
            'mahasiswa' => 3,
        };

        // Simpan user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $roleId, // Simpan sebagai angka
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect berdasarkan role
        return redirect()->route(match ($roleId) {
            1 => 'admin.dashboard',
            2 => 'dosen.dashboard',
            3 => 'mahasiswa.dashboard',
        });
    }
}
