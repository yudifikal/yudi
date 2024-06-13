<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class AdminKonsultasiController extends Controller
{
    public function dashboard()
    {
        $konsultasi = Konsultasi::where('status', 'Menunggu Persetujuan')->get();
        return view('dashboard', compact('konsultasi'));
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
