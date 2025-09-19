<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'type',
        'quantity',
        'date',
        'note',
        'user_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk label type
    public function getTypeLabelAttribute()
    {
        return $this->type === 'in' ? 'Masuk' : 'Keluar';
    }
}
