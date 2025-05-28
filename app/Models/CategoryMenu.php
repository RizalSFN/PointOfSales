<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMenu extends Model
{
    protected $table = 'category_menus';

    protected $fillable = [
        'nama',
        'gambar'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id', 'category_menu_id');
    }

    public function discount_categories()
    {
        return $this->hasMany(DiscountCategory::class, 'id', 'category_menu_id');
    }
}
