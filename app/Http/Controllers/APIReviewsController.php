<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Review;

class APIReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $reviews = Location::find($id)->reviews()->get();
        // $photo = Location::photos();

        return $reviews;
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($location_id, $review_id)
    {
        //
        $review = Review::find($review_id);
        // dd($location->photos);
        return $review;

    }
}
