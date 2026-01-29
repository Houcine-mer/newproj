<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';

    public $incrementing = false;
    protected $primaryKey = null;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'number_of_hours',
        'total_price',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function car()
    {
        return $this->belongsTo(Car::class);
    }

    public $timestamps = true;
}
