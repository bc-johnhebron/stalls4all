<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	// Set Fillable Properties
    protected $fillable = [
        'stars', 'sing_or_mult', 'cleanliness', 'changing_station', 'unisex',
        'doors', 'locks', 'feel_safe', 'wifi', 'customer_only', 'wheelchair_accessible',
        'comment'
    ];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
