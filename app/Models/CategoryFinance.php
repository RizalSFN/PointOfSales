<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFinance extends Model
{
    protected $table = 'category_finances';

    protected $fillable = [
        'nama'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public function finances()
    {
        return $this->hasMany(Finance::class, 'id', 'category_finance_id');
    }
}
