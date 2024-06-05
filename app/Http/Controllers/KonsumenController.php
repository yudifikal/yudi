<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KonsumenController extends Controller
{
    // Function to display the list of users
    public function index()
    {
        $data = User::orderBy('email', 'desc')->paginate(15);
        return view('konsumen', compact('data'));
    }

    // Function to show the form for editing a specific user
    public function edit($email)
    {
        $data = User::findOrFail($email);
        return view('konsumen.edit', compact('data'));
    }

    // Function to update a specific user in the database
    public function update(Request $request, $email)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'email' => 'required|email|max:50',
            'password' => 'nullable|min:6',
            'alamat' => 'required|max:50',
            'no_hp' => 'required|max:50',
            'role' => 'required|max:50',
        ], [
            'nama.required' => 'Nama Wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 50 karakter',
            'password.min' => 'Password minimal 6 karakter',
            'alamat.required' => 'Alamat Wajib diisi',
            'alamat.max' => 'Alamat maksimal 50 karakter',
            'no_hp.required' => 'Nomor Hp Wajib diisi',
            'no_hp.max' => 'Nomor Hp maksimal 50 karakter',
            'role.required' => 'Role Wajib diisi',
            'role.max' => 'Role maksimal 50 karakter',
        ]);

        $user = User::findOrFail($email);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('konsumen.index')->with('success', 'Data berhasil diperbarui');
    }

    // Function to delete a specific user from the database
    public function destroy($email)
    {
        $user = User::findOrFail($email);
        $user->delete();

        return redirect()->route('konsumen.index')->with('success', 'Data berhasil dihapus');
    }
    public function dashboardkonsumen()
    {
        return view('dashboardkonsumen');
    }
    public function jasakontruksikonsumen()
    {
        return view('jasakontruksikonsumen');
    }
    public function jasatukangkonsumen()
    {
        return view('jasatukangkonsumen');
    }
    public function materialkonsumen()
    {
        return view('materialkonsumen');
    }
    public function pesanankonsumen()
    {
        return view('pesanankonsumen');
    }
}
