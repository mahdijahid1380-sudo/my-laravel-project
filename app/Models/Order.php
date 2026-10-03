<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'table_id',
        'order_time',
        'total_amount',
        'status',
        'customer_phone',
        'customer_name',
    ];

    protected $casts = [
        'order_time' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id', 'table_id');
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'order_id', 'order_id');
    }
}