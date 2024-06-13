<?php

// Controller: PesananController.php
namespace App\Http\Controllers;

use App\Models\JasaKontruksi;
use App\Models\JasaTukang;
use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\Tukang;
use App\Models\Material;
use App\Models\PesananKontruksi;
use App\Models\PesananTukang;
use App\Models\PesananMaterial;

class PesananController extends Controller
{
    // Menampilkan form pesanan konstruksi
    // app/Http/Controllers/PesananController.php
    public function pesananKonsumen()
    {
        $pesananKontruksi = PesananKontruksi::all();
        $pesananTukang = PesananTukang::all();
        $pesananMaterial = PesananMaterial::all();

        return view('pesanankonsumen', compact('pesananKontruksi', 'pesananTukang', 'pesananMaterial'));
    }

    public function formPesananKontruksi($id)
    {
        $kontruksi = JasaKontruksi::findOrFail($id);
        $user = auth()->user();

        return view('formPesananKontruksi', compact('kontruksi', 'user'));
    }

    public function buatPesananKontruksi(Request $request)
    {
        $request->validate([
            'dp_bayar' => 'required|numeric',
        ]);

        $sisa_bayar = $request->total_bayar - $request->dp_bayar;

        PesananKontruksi::create([
            'tgl_pesanan' => now(),
            'dp_bayar' => $request->dp_bayar,
            'total_bayar' => $request->total_bayar,
            'sisa_bayar' => $sisa_bayar,
            'id_kontruksi' => $request->kontruksi_id,
            'nama_konsumen' => $request->nama_konsumen,
            'alamat_konsumen' => $request->alamat_konsumen,
            'no_hpkonsumen' => $request->no_hpkonsumen,
            'status' => 'Menunggu Pembayaran',
        ]);

        return redirect()->route('pesanankonsumen')->with('success', 'Pesanan konstruksi berhasil dibuat');
    }

    public function formPesananTukang($id)
    {
        $tukang = JasaTukang::findOrFail($id);
        $user = auth()->user();

        return view('formPesananTukang', compact('tukang', 'user'));
    }

    public function buatPesananTukang(Request $request)
    {
        $request->validate([
            'total_bayar' => 'required|numeric',
        ]);

        PesananTukang::create([
            'tgl_pesanan' => now(),
            'total_bayar' => $request->total_bayar,
            'id_tukang' => $request->tukang_id,
            'nama_konsumen' => $request->nama_konsumen,
            'alamat_konsumen' => $request->alamat_konsumen,
            'no_hpkonsumen' => $request->no_hpkonsumen,
            'status' => 'Menunggu Pembayaran',
        ]);

        return redirect()->route('pesanankonsumen')->with('success', 'Pesanan tukang berhasil dibuat');
    }

    public function formPesananMaterial($id)
    {
        $material = Material::findOrFail($id);
        $user = auth()->user();

        return view('formPesananMaterial', compact('material', 'user'));
    }

    public function buatPesananMaterial(Request $request)
    {
        $request->validate([
            'total_bayar' => 'required|numeric',
        ]);

        PesananMaterial::create([
            'tgl_pesanan' => now(),
            'total_bayar' => $request->total_bayar,
            'id_material' => $request->material_id,
            'nama_konsumen' => $request->nama_konsumen,
            'alamat_konsumen' => $request->alamat_konsumen,
            'no_hpkonsumen' => $request->no_hpkonsumen,
            'status' => 'Menunggu Pembayaran',
        ]);

        return redirect()->route('pesanankonsumen')->with('success', 'Pesanan material berhasil dibuat');
    }
}
