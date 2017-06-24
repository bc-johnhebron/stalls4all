<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/locations', 'APILocationsController@index');
Route::get('/locations/{id}', 'APILocationsController@show');
Route::get('/locations/{id}/reviews', 'APIReviewsController@index');
Route::get('/locations/{id}/reviews/{review_id}', 'APIReviewsController@show');
