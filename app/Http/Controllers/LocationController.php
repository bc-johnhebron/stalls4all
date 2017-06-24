<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
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
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $location = new Location();
        if ($request->input('name') !== NULL) {
            $location->name = $request->input('name');
        } else { $location->name = NULL ;}
        if ($request->input('description') !== NULL) {
            $location->description = $request->input('description');
        } else { $location->description = NULL ;}
        if ($request->input('category') !== NULL) {
            $location->category = $request->input('category');
        } else { $location->category = NULL ;}
        if ($request->input('address1') !== NULL) {
            $location->address1 = $request->input('address1');
        } else { $location->address1 = NULL ;}
        if ($request->input('address2') !== NULL) {
            $location->address2 = $request->input('address2');
        } else { $location->address2 = NULL ;}
        if ($request->input('city') !== NULL) {
            $location->city = $request->input('city');
        } else { $location->city = NULL ;}
        if ($request->input('state') !== NULL) {
            $location->state = $request->input('state');
        } else { $location->state = NULL ;}
        if ($request->input('zip') !== NULL) {
            $location->zip = $request->input('zip');
        } else { $location->zip = NULL ;}

        $location->save();

        return redirect("/locations/{$location->id}");
        
        
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
        return view('locations.show', compact('location'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
