<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    public const TIPE_MENU = 'menu';
    public const TIPE_CATEGORY = 'category';
    public const TIPE_TOTAL = 'total';
    public const TIPE_CUSTOM = 'custom';
    public const STATUS_AKTIF = 'aktif';
    public const STATUS_NONAKTIF = 'nonaktif';

    protected $fillable = [
        'nama',
        'tipe',
        'is_percentage',
        'minimal_transaksi',
        'berlaku_dari',
        'berlaku_sampai',
        'status'
    ];

    protected $casts = [
        'nama' => 'string',
        'is_percentage' => 'boolean',
        'berlaku_dari' => 'datetime',
        'berlaku_sampai' => 'datetime'
    ];

    public function getFormattedMinimalTransaksi()
    {
        return 'Rp ' . number_format($this->minimal_transaksi, 0, ',', '.');
    }

    public function discount_menus()
    {
        return $this->hasMany(DiscountMenu::class, 'id', 'discount_id');
    }

    public function discount_categories()
    {
        return $this->hasMany(DiscountCategory::class, 'id', 'discount_id');
    }

    public function scopeDiscountStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeDiscountTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }
}
