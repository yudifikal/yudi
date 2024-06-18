<?php

// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use App\Models\PesananMaterial;
use App\Models\PesananTukang;
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
        XenditConfiguration::setXenditKey('your-xendit-api-key-here');

        $params = [
            'external_id' => 'order_id_' . $request->order_id,
            'payer_email' => $request->email,
            'description' => 'Pembayaran Pesanan #' . $request->order_id,
            'amount' => $request->amount,
        ];

        $invoice = \Xendit\Invoice::create($params);

        return redirect($invoice['invoice_url']);
    }
}
