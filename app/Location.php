<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	// Set Fillable Properties
    protected $fillable = [
        'lat', 'long', 'name', 'description', 'category',
        'address1', 'address2', 'city', 'state', 'zip'
    ];

    public function photos()
    {
        return $this->hasMany('App\Photo', 'entity_id');
    }

    public function reviews()
    {
    	return $this->hasMany('App\Review');
    }

    public function rating_stars()
    {

    }

}


