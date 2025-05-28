<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokMenu extends Model
{
    protected $table = 'stok_menus';

    public const TIPE_IN = 'in';
    public const TIPE_OUT = 'out';

    protected $fillable = [
        'tipe',
        'jumlah',
        'keterangan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_shifts()
    {
        return $this->hasOne(UserShift::class, 'user_shift_id', 'id');
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
