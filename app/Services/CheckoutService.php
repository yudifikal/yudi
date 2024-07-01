<?php

namespace App\Services;

use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class CheckoutService
{
  public function __construct()
  {
    Configuration::setXenditKey('xnd_development_fLkIgsjnkPYRObr0BtIEXrHEfOJJcyENTi2kXbcHqifFDQFavjp7Q0QcwT1r');
  }

  public function createLink(string $jenis, string $id, string $desc, int $harga)
  {
    $api = new InvoiceApi();

    $req = new CreateInvoiceRequest([
      'external_id' => "{$jenis}|{$id}",
      'description' => $desc,
      'amount' => $harga,
      // 'payer_email' =>  $email,
      'currency' => 'IDR',
      'success_redirect_url' => 'http://127.0.0.1:8000/pesanankonsumen'
    ]);

    $data = $api->createInvoice($req);

    return $data['invoice_url'];
  }
}
