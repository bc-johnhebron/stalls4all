<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Location;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Location $location)
    {
        //
        
        $review = new Review();

        $review->user_id = 1;

        if ($request->input('stars') !== NULL) {
            $review->stars = $request->input('stars');
        } else { $review->stars = NULL ;}
        if ($request->input('sing_or_mult') !== NULL) {
            $review->sing_or_mult = $request->input('sing_or_mult');
        } else { $review->sing_or_mult = NULL ;}
        if ($request->input('cleanliness') !== NULL) {
            $review->cleanliness = $request->input('cleanliness');
        } else { $review->cleanliness = NULL ;}
        if ($request->input('changing_station') !== NULL) {
            $review->changing_station = $request->input('changing_station');
        } else { $review->changing_station = NULL ;}
        if ($request->input('unisex') !== NULL) {
            $review->unisex = $request->input('unisex');
        } else { $review->unisex = NULL ;}
        if ($request->input('doors') !== NULL) {
            $review->doors = $request->input('doors');
        } else { $review->doors = NULL ;}
        if ($request->input('locks') !== NULL) {
            $review->locks = $request->input('locks');
        } else { $review->locks = NULL ;}
        if ($request->input('feel_safe') !== NULL) {
            $review->feel_safe = $request->input('feel_safe');
        } else { $review->feel_safe = NULL ;}
        if ($request->input('wifi') !== NULL) {
            $review->wifi = $request->input('wifi');
        } else { $review->wifi = NULL ;}
        if ($request->input('customer_only') !== NULL) {
            $review->customer_only = $request->input('customer_only');
        } else { $review->customer_only = NULL ;}
        if ($request->input('wheelchair_accessible') !== NULL) {
            $review->wheelchair_accessible = $request->input('wheelchair_accessible');
        } else { $review->wheelchair_accessible = NULL ;}
        if ($request->input('comment') !== NULL) {
            $review->comment = $request->input('comment');
        } else { $review->comment = NULL ;}

        $location->reviews()->save($review);

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
