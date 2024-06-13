<?php

namespace App\Http\Controllers;

use App\Models\JasaKontruksi;
use App\Models\JasaTukang;
use App\Models\Konsumen;
use App\Models\material;
use App\Models\Pengelola;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaController extends Controller
{
    public function tampilan()
    {
        return view('login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function jasakontruksi()
    {
        return view('jasakontruksi');
    }
    public function jasatukang()
    {
        return view('jasatukang');
    }
    public function material()
    {
        return view('material');
    }
    public function pesanan()
    {
        return view('pesanan');
    }
    public function konsumen()
    {
        return view('konsumen');
    }

    public function daftar(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = new User();

            $request->validate([
                'nama' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'password' => 'required|string|min:8',
                'alamat' => 'required|string|max:50',
                'no_hp' => 'required|string|max:50',
                'no_hp' => 'required',

            ]);

            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'role' => $request->role, // atau sesuai dengan role yang diinginkan
            ]);
            return redirect('/login');
        }

        return view('/daftar');
    }
    public function tambahkontruksi(Request $request)
    {
        if ($request->isMethod('post')) {
            $kontruksi = new JasaKontruksi();

            $request->validate([
                'id' => 'required',
                'nama_kontruksi' => 'required',
                'harga_kontruksi' => 'required',
                'keterangan_kontruksi' => 'required',
                'foto_kontruksi' => 'required',
            ]);
            $path = '';
            if ($request->hasFile('foto_kontruksi')) {
                $file = $request->file('foto_kontruksi');
                $fileName = $file->getClientOriginalName(); // Get the original file name
                $path = $file->storeAs('images', $fileName, 'public'); // Store the file in storage/app/public/images
            }

            jasakontruksi::create([
                'id' => $request->id,
                'nama_kontruksi' => $request->nama_kontruksi,
                'harga_kontruksi' => $request->harga_kontruksi,
                'foto_kontruksi' => $path, // Store the file path in the database
                'keterangan_kontruksi' => $request->keterangan_kontruksi,
            ]);

            return redirect('/jasakontruksi');
        }

        return view('/tambahkontruksi');
    }
    public function tambahtukang(Request $request)
    {
        if ($request->isMethod('post')) {
            $tukang = new JasaTukang();

            $request->validate([
                'id' => 'required',
                'nama_tukang' => 'required',
                'harga_tukang' => 'required',
                'keterangan_tukang' => 'required',
                'foto_tukang' => 'required',
            ]);
            $path = '';
            if ($request->hasFile('foto_tukang')) {
                $file = $request->file('foto_tukang');
                $fileName = $file->getClientOriginalName(); // Get the original file name
                $path = $file->storeAs('images', $fileName, 'public'); // Store the file in storage/app/public/images
            }

            jasaTukang::create([
                'id' => $request->id,
                'nama_tukang' => $request->nama_tukang,
                'harga_tukang' => $request->harga_tukang,
                'foto_tukang' => $path, // Store the file path in the database
                'keterangan_tukang' => $request->keterangan_tukang,
            ]);

            return redirect('/jasatukang');
        }

        return view('/tambahtukang');
    }
    public function tambahmaterial(Request $request)
    {
        if ($request->isMethod('post')) {
            $material = new material();

            $request->validate([
                'id' => 'required',
                'nama_material' => 'required',
                'harga_material' => 'required',
                'keterangan_material' => 'required',
                'foto_material' => 'required',
            ]);
            $path = '';
            if ($request->hasFile('foto_material')) {
                $file = $request->file('foto_material');
                $fileName = $file->getClientOriginalName(); // Get the original file name
                $path = $file->storeAs('images', $fileName, 'public'); // Store the file in storage/app/public/images
            }

            material::create([
                'id' => $request->id,
                'nama_material' => $request->nama_material,
                'harga_material' => $request->harga_material,
                'foto_material' => $path, // Store the file path in the database
                'keterangan_material' => $request->keterangan_material,
            ]);

            return redirect('/material');
        }

        return view('/tambahmaterial');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_kontruksi' => 'required|string|max:255',
    //         'harga_kontruksi' => 'required|numeric',
    //         'foto_kontruksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'keterangan_kontruksi' => 'required|string',
    //     ]);

    //     if ($request->hasFile('foto_kontruksi')) {
    //         $file = $request->file('foto_kontruksi');
    //         $fileName = $file->getClientOriginalName(); // Get the original file name
    //         $path = $file->storeAs('images', $fileName, 'public'); // Store the file in storage/app/public/images
    //     }

    //     jasakontruksi::create([
    //         'nama_kontruksi' => $request->nama_kontruksi,
    //         'harga_kontruksi' => $request->harga_kontruksi,
    //         'foto_kontruksi' => $path, // Store the file path in the database
    //         'keterangan_kontruksi' => $request->keterangan_kontruksi,
    //     ]);

    //     return redirect()->route('jasakontruksi')->with('success', 'Kontruksi created successfully.');
    // }


    public function readData()
    {
        // Membaca semua data dari tabel 'users'
        $jasakontruksi = JasaKontruksi::all();

        // Mengembalikan data ke view
        return view('jasakontruksi', compact('jasakontruksi'));
    }

    function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $konsumen = User::where('email', '=', $request->email)->first();
            if ($konsumen == null) {
                return back()->withErrors('akun tidak ditemukan')->withInput();
            }

            if ($konsumen->password != $request->password) {
                return back()->withInput()->withErrors('password salah');
            }
            return redirect('/dashboard');
        }
        return view('/login');
    }
    public function destroy($id)
    {
        JasaKontruksi::where('id', $id)->delete();
        return redirect()->to('jasakontruksi')->with('sucess', 'Berhasil Menghapus Data');
    }
}
