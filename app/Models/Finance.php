<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table = 'finances';

    protected $fillable = [
        'saldo_awal',
        'saldo_akhir',
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

    public function category_finances()
    {
        return $this->belongsTo(CategoryFinance::class, 'category_finance_id', 'id');
    }

    public function getFormattedSaldoAwal()
    {
        return 'Rp ' . number_format($this->saldo_awal, 0, ',', '.');
    }

    public function getFormattedSaldoAkhir()
    {
        return 'Rp ' . number_format($this->saldo_akhir, 0, ',', '.');
    }
}
