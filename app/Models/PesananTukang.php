<?php

// app/Models/PesananTukang.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananTukang extends Model
{
    use HasFactory;

    protected $table = 'pesanan_tukang';
    protected $fillable = [
        'tgl_pesanan', 'total_bayar', 'id_tukang',
        'nama_konsumen', 'alamat_konsumen', 'no_hpkonsumen', 'status'
    ];

    public function tukang()
    {
        return $this->belongsTo(JasaTukang::class, 'id_tukang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_konsumen', 'email');
    }
}
