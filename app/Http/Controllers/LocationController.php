<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Photo;
use App\YelpRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /*
            Using Yelp Fusion API to grab the businesses
            Returns 20 at a time by default

            &categories=food,localflavor,nightlife,restaurants,shopping
            &sort_by=distance

            &attributes=gender_neutral_restrooms
        */

        /* 
            Get the Location
        */

        $bearer_token = 'jSIDkWGFWjZ0-vnKrnPZFL0-gLS1kJxh4mls_8By6MT0izX3RY2TQIzxjf9QF0gl5RY0OQKiNzoRYRfyZApJI_ve7KK1VWb4mndmYR7WykwUA9746qDMbZ8ugkBPWXYx';
        $host = 'https://api.yelp.com';
        $path = '/v3/businesses/search';


        if ($request->query('zip') !== NULL AND $request->query('zip') !== '') {
            // if zip : ?location=
            $url_params = array( 
                                'categories' => 'food,localflavor,nightlife,restaurants,shopping',
                                'sort_by' => 'distance',
                                'location' => $request->query('zip')
                                );
            $locations = YelpRequest::request($bearer_token, $host, $path, $url_params);
        }elseif ($request->query('all') !== NULL AND $request->query('all') !== '') {
            // elseif lat and lon: ?latitude= &longitude=
            $locations = Location::all();
        } else{
            // else ?location=Austin
            $locations = Location::take(15)->get();
        }
        

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

        $var = $request->file('image')->store('public/business_profiles');
        $var_plode = explode('/', $var);

        $photo = new Photo();
        $photo->entity_name = "Location";
        $photo->entity_id = $location->id;
        $photo->path = $var;
        $photo->name = $var_plode[2];
        $photo->order = 1;
        $photo->primary_image = TRUE;
        $location->photos()->save($photo);

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
        // dd($location->photos);
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
