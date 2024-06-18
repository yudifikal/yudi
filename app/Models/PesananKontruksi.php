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
        'tanggal', 'id_kontruksi',
        'email_konsumen', 'dibayar'
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
