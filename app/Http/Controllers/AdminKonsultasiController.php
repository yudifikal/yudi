<?php

namespace App\Http\Controllers;

use App\Models\JasaTukang;
use App\Models\Konsultasi;
use App\Models\material;
use App\Models\PesananMaterial;
use App\Models\PesananTukang;
use Illuminate\Http\Request;

class AdminKonsultasiController extends Controller
{
    public function dashboard()
    {
        $konsultasi = Konsultasi::where('status', 'Menunggu Persetujuan')->get();
        $jmlTukang = JasaTukang::all()->count();
        $jmlMaterial = material::all()->count();
        $jmlPesanan = PesananTukang::all()->count();
        $jmlPesanan1 = PesananMaterial::all()->count();
        $totalPesanan = $jmlPesanan + $jmlPesanan1;

        return view('dashboard', compact('konsultasi', 'jmlTukang', 'jmlMaterial', 'totalPesanan'));
    }

    public function approve($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->status = 'Disetujui';
        $konsultasi->save();

        return redirect()->route('dashboard')->with('success', 'Konsultasi berhasil disetujui.');
    }

    public function reject($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->status = 'Ditolak, Silahkan atur jadwal baru';
        $konsultasi->save();

        return redirect()->route('dashboard')->with('success', 'Konsultasi berhasil ditolak.');
    }
}
