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

    public function menus()
    {
        return $this->hasOne(Menu::class, 'id', 'user_shift_id');
    }

    public function finances()
    {
        return $this->hasOne(Finance::class, 'id', 'user_shift_id');
    }

    public function discount_menus()
    {
        return $this->hasOne(DiscountMenu::class, 'id', 'user_shift_id');
    }

    public function discount_categories()
    {
        return $this->hasOne(DiscountCategory::class, 'id', 'user_shidt_id');
    }

    public function stok_menus()
    {
        return $this->hasOne(StokMenu::class, 'id', 'user_shift_id');
    }

    public function orders()
    {
        return $this->hasOne(Order::class, 'id', 'user_shift_id');
    }

    public function riwayats()
    {
        return $this->hasOne(Riwayat::class, 'id', 'user_shift_id');
    }

    public function scopeUserShift($query, $shift)
    {
        return $query->where('jenis_shift', $shift);
    }

    public function scopeUserShiftStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeUserShiftToday($query)
    {
        return $query->where('created_at', today());
    }
}
