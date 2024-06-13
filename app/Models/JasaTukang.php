<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaTukang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_tukang', // Ensure this field is in the fillable array
        'harga_tukang',
        'foto_tukang',
        'keterangan_tukang',
        'status'
    ];
    protected $attributes = [
        'nama_tukang' => 'Default Name' // Set a default value for 'nama_kontruksi'
    ]; // Add id_kontruksi attribute to the fillable array
    // Add other attributes here if necessary

    protected $table = 'tb_tukang';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
