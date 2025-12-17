<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BagAdmin extends Model
{
    use HasFactory;

    protected $table = 'bag_admins';

    protected $fillable = [
        'kode_admin',
        'nama_admin',
        'email',
        'alamat',
        'no_telepon',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

