<?php

// app/Models/PesananKontruksi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananKontruksi extends Model
{
    use HasFactory;

    protected $table = 'pesanan_kontruksi';
    protected $fillable = [
        'tgl_pesanan', 'dp_bayar', 'total_bayar', 'sisa_bayar', 'id_kontruksi',
        'nama_konsumen', 'alamat_konsumen', 'no_hpkonsumen', 'status'
    ];

    public function kontruksi()
    {
        return $this->belongsTo(JasaKontruksi::class, 'id_kontruksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_konsumen', 'email');
    }
}
