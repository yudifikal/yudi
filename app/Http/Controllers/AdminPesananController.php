<?php

// Controller: AdminPesananController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananKontruksi;
use App\Models\PesananTukang;
use App\Models\PesananMaterial;

class AdminPesananController extends Controller
{
    public function index()
    {
        // $pesananKontruksi = PesananKontruksi::all();
        $pesananTukang = PesananTukang::all();
        $pesananMaterial = PesananMaterial::all();

        return view('pesanan', compact('pesananTukang', 'pesananMaterial'));
    }

    public function update(Request $request, $id, $type)
    {

        if ($type == 'tukang') {
            $pesanan = PesananTukang::findOrFail($id);
        } elseif ($type == 'material') {
            $pesanan = PesananMaterial::findOrFail($id);
        } else {
            return redirect()->back()->with('error', 'Invalid type.');
        }

        $pesanan->status = 'Dikirim';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan berhasil diperbarui.');
    }
}


    // Metode yang sama untuk Tukang dan Material
    // ... (edit, update, delete)
