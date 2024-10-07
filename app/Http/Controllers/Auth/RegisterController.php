<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Menampilkan halaman register
    public function showRegistrationForm()
    {
        return view('auth.register'); // View untuk halaman register
    }

    // Menangani request register
    public function register(Request $request)
    {
        // Validasi input register
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login pengguna baru secara otomatis
        Auth::login($user);

        // Redirect ke halaman CRUD Mobil
        return redirect()->route('mobils.index')->with('success', 'Registration successful. Welcome!');
    }
}
