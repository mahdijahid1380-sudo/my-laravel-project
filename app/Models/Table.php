<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';

    protected $primaryKey = 'table_id';

    protected $fillable = [
        'namber',
        'capacity',
        'status',
        'category',
    ];

    protected $casts = [
        'namber' => 'integer',
        'capacity' => 'integer',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'table_id', 'table_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'table_id', 'table_id');
    }
}