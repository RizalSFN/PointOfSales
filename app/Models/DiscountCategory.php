<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCategory extends Model
{
    protected $table = 'discount_categories';

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

    public function category_menus()
    {
        return $this->belongsTo(CategoryMenu::class, 'category_menu_id', 'id');
    }
}
