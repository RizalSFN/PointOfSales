<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public const JENIS_DINE_IN = 'dine in';
    public const JENIS_TAKE_AWAY = 'take away';
    public const STATUS_PENDING = 'pending';
    public const STATUS_SELESAI = 'selesai';
    public const STATUS_BATAL = 'batal';

    protected $fillable = [
        'customer_name',
        'waktu',
        'sub_total',
        'sub_total_diskon',
        'total',
        'jenis',
        'tunai',
        'kembalian',
        'status'
    ];

    protected $casts = [
        'customer_name' => 'string',
        'waktu' => 'datetime',
    ];

    public function getFormattedSubTotal()
    {
        return 'Rp ' . number_format($this->sub_total, 0, ',', '.');
    }

    public function getFormattedSubTotalDiskon()
    {
        return 'Rp ' . number_format($this->sub_total_diskon, 0, ',', '.');
    }

    public function getFormattedTotal()
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    public function getFormattedTunai()
    {
        return 'Rp ' . number_format($this->tunai, 0, ',', '.');
    }

    public function getFormattedKembalian()
    {
        return 'Rp ' . number_format($this->kembalian, 0, ',', '.');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_shifts()
    {
        return $this->hasOne(UserShift::class, 'user_shift_id', 'id');
    }

    public function metode_pembayarans()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'id', 'order_id');
    }

    public function scopeOrderToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeOrderBatal($query)
    {
        return $query->where('status', 'batal');
    }

    public function scopeOrderSelesai($query)
    {
        return $query->where('status', 'selesai');
    }
}
