<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'name',
        'price',
        'category',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'menu_id', 'menu_id');
    }

    /**
     * این متد به لاراول می‌گوید که در آدرس‌ها به جای id پیش‌فرض، از ستون menu_id استفاده کند.
     */
    public function getRouteKeyName()
    {
        return 'menu_id';
    }
}
