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
}
