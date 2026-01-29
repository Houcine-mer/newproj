<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //

    protected $fillable = ['name' , 'year' , 'image_url' ,'buyprice', 'rentprice' , 'tourprice' , 'buy' , 'rent' , 'tour' ,'brand_name'];
    protected $casts = [
        'buy'=>'boolean',
        'rent'=>'boolean',
        'tour'=>'boolean'
    ];
    public function brands() {
        return $this->belongsTo(Brand::class , 'brand_name' , 'name');
    }
    function renters() {
        return $this->belongsToMany(User::class, 'rent')
            ->withPivot(['start_date', 'number_of_days', 'total_price'])
            ->withTimestamps();
    }

        function Toured() {
        return $this->belongsToMany(User::class, 'tours')
            ->withPivot(['start_date', 'number_of_hours', 'total_price'])
            ->withTimestamps();
    }

    

}
