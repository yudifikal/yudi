<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasi';

    protected $fillable = [
        'tanggal_konsultasi',
        'jam_konsultasi',
        'nama_konsumen',
        'alamat_konsumen',
        'no_hpkonsumen',
        'harga_konsultasi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_konsumen', 'email');
    }

    public function kontruksi()
    {
        return $this->belongsTo(JasaKontruksi::class, 'harga_konsultasi', 'id');
    }
}
