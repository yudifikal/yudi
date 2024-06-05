<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|string|max:50',
        ]);

        // Hash password sebelum disimpan
        $user = new User();
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->alamat = $request->input('alamat');
        $user->no_hp = $request->input('no_hp');
        $user->save();

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // Redirect ke halaman dashboard setelah login berhasil
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
