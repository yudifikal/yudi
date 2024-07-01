<?php

// Controller: AdminPesananController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananKontruksi;
use App\Models\PesananTukang;
use App\Models\PesananMaterial;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function cetakPdf(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $pesananTukang = PesananTukang::whereBetween('tgl_pesanan', [$startDate, $endDate])->get();
        $pesananMaterial = PesananMaterial::whereBetween('tgl_pesanan', [$startDate, $endDate])->get();

        $pdf = PDF::loadView('pesanan_pdf', compact('pesananTukang', 'pesananMaterial'));

        return $pdf->download('pesanan.pdf');
    }
}


    // Metode yang sama untuk Tukang dan Material
    // ... (edit, update, delete)
