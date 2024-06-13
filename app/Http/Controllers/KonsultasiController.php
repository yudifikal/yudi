<?php

namespace App\Http\Controllers;

use App\Models\JasaKontruksi;
use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\User;
use App\Models\TbKontruksi;

class KonsultasiController extends Controller
{
    public function create($id)
    {
        $user = auth()->user();
        $kontruksi = JasaKontruksi::findOrFail($id);

        return view('konsultasi.create', compact('user', 'kontruksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_konsultasi' => 'required|date',
            'jam_konsultasi' => 'required|date_format:H:i',
        ]);

        Konsultasi::create([
            'nama_konsumen' => $request->user()->email,
            'alamat_konsumen' => $request->user()->email,
            'no_hpkonsumen' => $request->user()->email,
            'harga_konsultasi' => $request->kontruksi_id,
            'tanggal_konsultasi' => $request->tanggal_konsultasi,
            'jam_konsultasi' => $request->jam_konsultasi,
            'status' => 'Menunggu Persetujuan',
        ]);

        return redirect()->route('konsultasi.index');
    }

    public function index()
    {
        $konsultasi = Konsultasi::where('nama_konsumen', auth()->user()->email)->get();

        return view('konsultasi.index', compact('konsultasi'));
    }
}
