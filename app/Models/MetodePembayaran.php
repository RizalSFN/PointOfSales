<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayarans';

    public const STATUS_AKTIF = 'aktif';
    public const STATUS_NONAKTIF = 'nonaktif';

    protected $fillable = [
        'nama',
        'status'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id', 'metode_pembayaran_id');
    }

    public function scopeMetodePembayaranStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
