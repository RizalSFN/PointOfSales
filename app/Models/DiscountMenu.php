<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountMenu extends Model
{
    protected $table = 'discount_menus';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_shifts()
    {
        return $this->hasOne(UserShift::class, 'user_shift_id', 'id');
    }

    public function discounts()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
