<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'email',
        'nama', // Ensure this field is in the fillable array
        'alamat',
        'no_hp',
        'role',
        'password'
    ];
    protected $attributes = [
        'nama' => 'Default Name' // Set a default value for 'nama_kontruksi'
    ]; // Add id_kontruksi attribute to the fillable array
    // Add other attributes here if necessary

    protected $table = 'users';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
