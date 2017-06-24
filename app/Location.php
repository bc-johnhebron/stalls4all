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


}


