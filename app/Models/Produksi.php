<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'productions';
    protected $fillable = [
        'kode_produksi',
        'pesanan_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'pesanan_id');
    }
}
