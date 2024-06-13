<?php

// app/Models/PesananMaterial.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananMaterial extends Model
{
    use HasFactory;

    protected $table = 'pesanan_material';
    protected $fillable = [
        'tgl_pesanan', 'total_bayar', 'id_material',
        'nama_konsumen', 'alamat_konsumen', 'no_hpkonsumen', 'status'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_konsumen', 'email');
    }
}
