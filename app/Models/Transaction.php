<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_code',
        'customer_id',
        'admin_name',
        'jenis_pesanan',
        'jenis_payment',
        'nominal_dp',
        'status_pelunasan',
        'date',
        'total',
        'jumlah_pesanan',
        'nama_barang',
        'harga_pesanan',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'total' => 'decimal:2',
        'nominal_dp' => 'decimal:2',
        'harga_pesanan' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
