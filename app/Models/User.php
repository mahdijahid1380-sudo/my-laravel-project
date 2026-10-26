<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    // لاراول به طور پیش فرض به دنبال updated_at و created_at میگردد، چون جدول شما create_at دارد این را کاستوم میکنیم:
    const CREATED_AT = 'create_at';
    const UPDATED_AT = null; 

    protected $fillable = [
        'username',
        'password',
        'full_name',
        'phone',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
