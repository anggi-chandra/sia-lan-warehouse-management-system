<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagGudang extends Model
{
    use HasFactory;

    protected $table = 'bag_gudangs';
    protected $fillable = [
        'kode_bag_gudang',
        'nama',
        'email',
        'alamat',
        'no_telepon',
        'password',
    ];
}
