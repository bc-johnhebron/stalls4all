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
    public function index(Request $request)
    {

        //
        if ($request->query('zip') !== NULL AND $request->query('zip') !== '') {
            return Location::where('zip', '=', $request->query('zip'))->take(15)->get();
        }else{
            return Location::take(15)->get();
        }

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
