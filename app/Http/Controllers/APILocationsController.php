<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\YelpRequest;
use App\Review;

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
            $locations_JSON = json_decode(YelpRequest::request($bearer_token, $host, $path, $url_params), true);

            // Loop through returned businesses and look for bathroom reviews
            foreach ($locations_JSON['businesses'] as $id => $location) {
                $reviews = Review::where('yelp_id', $location['id'])->get()->toArray();
                $locations_JSON['businesses'][$id]['bathroom_reviews'] = $reviews;
            }

            // parse to JSON and return!
            return json_encode($locations_JSON);
        } elseif ($request->query('lat') !== NULL AND $request->query('lat') !== '' AND $request->query('lon') !== NULL AND $request->query('lon') !== '') {
            $url_params['latitude'] = $request->query('lat');
            $url_params['longitude'] = $request->query('lon');
            $locations_JSON = json_decode(YelpRequest::request($bearer_token, $host, $path, $url_params), true);

            // Loop through returned businesses and look for bathroom reviews
            foreach ($locations_JSON['businesses'] as $id => $location) {
                $reviews = Review::where('yelp_id', $location['id'])->get()->toArray();
                $locations_JSON['businesses'][$id]['bathroom_reviews'] = $reviews;
            }

            // parse to JSON and return!
            return json_encode($locations_JSON);

        } else {
            $url_params['location'] = "Austin";
            $locations_JSON = json_decode(YelpRequest::request($bearer_token, $host, $path, $url_params), true);

            // Loop through returned businesses and look for bathroom reviews
            foreach ($locations_JSON['businesses'] as $id => $location) {
                $reviews = Review::where('yelp_id', $location['id'])->get()->toArray();
                $locations_JSON['businesses'][$id]['bathroom_reviews'] = $reviews;
            }

            // parse to JSON and return!
            return json_encode($locations_JSON);
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

        $bearer_token = 'jSIDkWGFWjZ0-vnKrnPZFL0-gLS1kJxh4mls_8By6MT0izX3RY2TQIzxjf9QF0gl5RY0OQKiNzoRYRfyZApJI_ve7KK1VWb4mndmYR7WykwUA9746qDMbZ8ugkBPWXYx';
        $host = 'https://api.yelp.com';
        $path = "/v3/businesses/{$id}";

        $location_JSON = json_decode(YelpRequest::request($bearer_token, $host, $path, $url_params = array()), true);

        // Loop through returned businesses and look for bathroom reviews
        $reviews = Review::where('yelp_id', $location_JSON['id'])->get()->toArray();
        $location_JSON['bathroom_reviews'] = $reviews;

        // parse to JSON and return!
        return json_encode($location_JSON);
    }

    
}
