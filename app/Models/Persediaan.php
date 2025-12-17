<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Persediaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gudang(): BelongsTo
    {
        return $this->belongsTo(Gudang::class);
    }

    public function bagGudang(): BelongsTo
    {
        return $this->belongsTo(BagGudang::class);
    }
}
