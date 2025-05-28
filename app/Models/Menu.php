<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public const STATUS_AKTIF = 'aktif';
    public const STATUS_NONAKTIF = 'nonaktif';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'harga',
        'stok',
        'status'
    ];

    protected $casts = [
        'nama' => 'string',
        'deskripsi' => 'string'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_shifts()
    {
        return $this->hasOne(UserShift::class, 'user_shift_id', 'id');
    }

    public function category_menus()
    {
        return $this->belongsTo(CategoryMenu::class, 'category_menu_id', 'id');
    }

    public function discount_menus()
    {
        return $this->hasMany(DiscountMenu::class, 'id', 'menu_id');
    }

    public function stok_menus()
    {
        return $this->hasMany(StokMenu::class, 'id', 'menu_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'id', 'menu_id');
    }

    public function getFormattedHarga()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
