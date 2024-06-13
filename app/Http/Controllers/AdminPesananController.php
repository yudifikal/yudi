<?php

// Controller: AdminPesananController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananKontruksi;
use App\Models\PesananTukang;
use App\Models\PesananMaterial;

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
        $pesananKontruksi = PesananKontruksi::all();
        $pesananTukang = PesananTukang::all();
        $pesananMaterial = PesananMaterial::all();

        return view('pesanan', compact('pesananKontruksi', 'pesananTukang', 'pesananMaterial'));
    }
}

    // Metode yang sama untuk Tukang dan Material
    // ... (edit, update, delete)
