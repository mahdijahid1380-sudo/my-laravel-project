<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'res_id';

    protected $fillable = [
        'user_id',
        'table_id',
        'res_date',
        'res_time',
        'guest_count',
        'status',
    ];

    protected $casts = [
        'res_date' => 'date',
        'res_time' => 'datetime:H:i',
        'guest_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id', 'table_id');
    }
}