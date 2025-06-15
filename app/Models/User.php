<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';

    public const ROLE_ADMIN = 'admin';
    public const ROLE_SUPERADMIN = 'superadmin';
    public const STATUS_AKTIF = 'aktif';
    public const STATUS_NONAKTIF = 'nonaktif';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id', 'user_id');
    }

    public function finances()
    {
        return $this->hasMany(Finance::class, 'id', 'user_id');
    }

    public function discount_menus()
    {
        return $this->hasMany(DiscountMenu::class, 'id', 'user_id');
    }

    public function discount_categories()
    {
        return $this->hasMany(DiscountCategory::class, 'id', 'user_id');
    }

    public function stok_menus()
    {
        return $this->hasMany(StokMenu::class, 'id', 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id', 'user_id');
    }

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'id', 'user_id');
    }

    public function scopeUserStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
