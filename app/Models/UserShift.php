<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShift extends Model
{
    protected $table = 'user_shifts';

    public const SHIFT_SIANG = 'siang';
    public const SHIFT_MALAM = 'malam';
    public const STATUS_BERLANGSUNG = 'berlangsung';
    public const STATUS_SELESAI = 'selesai';

    protected $fillable = [
        'jenis_shift',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal',
        'status',
        'total_amount',
        'total_discount'
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime'
    ];
}
