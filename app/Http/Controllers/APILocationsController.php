<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\YelpRequest;

class APILocationsController extends Controller
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
        $limit = '20';
        $url_params = array('categories' => 'food,localflavor,nightlife,restaurants,shopping',
                            'sort_by' => 'distance');

        //
        if ($request->query('limit') !== NULL AND $request->query('limit') !=='' AND $request->query('limit') <= 50 AND $request->query('limit') >= 1) {
            $url_params['limit'] = $request->query('limit');
        }

        if ($request->query('zip') !== NULL AND $request->query('zip') !== '') {
            // if zip : ?location=
            $url_params['location'] = $request->query('zip');
            return YelpRequest::request($bearer_token, $host, $path, $url_params);
        } elseif ($request->query('lat') !== NULL AND $request->query('lat') !== '' AND $request->query('lon') !== NULL AND $request->query('lon') !== '') {
            $url_params['latitude'] = $request->query('lat');
            $url_params['longitude'] = $request->query('lon');
            return YelpRequest::request($bearer_token, $host, $path, $url_params);
        } else {
            $url_params['location'] = "Austin";
            return YelpRequest::request($bearer_token, $host, $path, $url_params);
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
