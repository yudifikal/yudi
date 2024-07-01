<?php

// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use App\Models\PesananMaterial;
use App\Models\PesananTukang;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Xendit\Xendit;

class PaymentController extends Controller
{
    public function showPaymentForm($id)
    {
        // Retrieve the order details using the ID
        $pesanan = PesananMaterial::find($id) ?? PesananTukang::find($id);

        return view('payment.form', compact('pesanan'));
    }

    public function processPayment(Request $request)
    {
        $id = $request->id;
        $harga = $request->harga;
        $jenis = $request->jenis;
        $nama = $request->nama;

        $checkout = new CheckoutService();
        $link = $checkout->createLink($jenis, $id, $nama, $harga);

        return redirect()->away($link);
    }

    public function xendit(Request $r)
    {
        $data = explode('|', $r['external_id']);
        $jenis = $data[0];
        $id = $data[1];

        if ($jenis == 'tukang') {
            $pesanan = PesananTukang::find($id);
            $pesanan->status = 'dibayar';
            $pesanan->save();
        } elseif ($jenis == 'material') {
            $pesanan = PesananMaterial::find($id);
            $pesanan->status = 'dibayar';
            $pesanan->save();
        }
    }
}
