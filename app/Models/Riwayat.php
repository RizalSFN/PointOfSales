<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayats';

    public const AKSI_CREATE = 'CREATE';
    public const AKSI_UPDATE = 'UPDATE';
    public const AKSI_DELETE = 'DELETE';
    public const ENTITY_USER = 'user';
    public const ENTITY_MENU = 'menu';
    public const ENTITY_DISCOUNT = 'discount';
    public const ENTITY_FINANCE = 'finance';
    public const ENTITY_ORDER = 'order';
    public const ENTITY_SETTING = 'setting';

    protected $fillable = [
        'aksi',
        'entity',
        'entity_id',
        'deskripsi'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_shifts()
    {
        return $this->hasOne(UserShift::class, 'user_shift_id', 'id');
    }
}
