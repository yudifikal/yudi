<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_material', // Ensure this field is in the fillable array
        'harga_material',
        'foto_material',
        'keterangan_material',
        'status'
    ];
    protected $attributes = [
        'nama_material' => 'Default Name' // Set a default value for 'nama_kontruksi'
    ]; // Add id_kontruksi attribute to the fillable array
    // Add other attributes here if necessary

    protected $table = 'tb_material';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
