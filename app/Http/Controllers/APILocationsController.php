<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class APILocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::all();
        // $photo = Location::photos();

        return $locations;
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $location = Location::find($id);
        // dd($location->photos);
        return $location;

    }
}
