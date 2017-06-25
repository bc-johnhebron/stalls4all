<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

class APIPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $photos = Location::find($id)->photos()->get();
        // $photo = Location::photos();

        return $photos;
    }
}
