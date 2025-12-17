<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengirim extends Model
{
    use HasFactory;

    protected $table = 'pengirims';
    protected $fillable = [
        'kode_pengirim',
        'pesanan_id',
        'nama_pengirim',
        'status_pengiriman',
        'tanggal_pengiriman'
    ];

    protected $casts = [
        'tanggal_pengiriman' => 'date',
    ];

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'pesanan_id');
    }
}
