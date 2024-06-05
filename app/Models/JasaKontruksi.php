<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaKontruksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kontruksi', // Ensure this field is in the fillable array
        'harga_kontruksi',
        'foto_kontruksi',


        'keterangan_kontruksi'
    ];
    protected $attributes = [
        'nama_kontruksi' => 'Default Name' // Set a default value for 'nama_kontruksi'
    ]; // Add id_kontruksi attribute to the fillable array
    // Add other attributes here if necessary

    protected $table = 'tb_kontruksi';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
