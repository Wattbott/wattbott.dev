<?php

/*

|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@testForm');

Route::post('/store', 'RunsController@store');
Route::get('/show', 'RunsController@show');
Route::get('/result', 'RunsController@result');
Route::get('/garbagetest', function() {
	
	// $curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
	// $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

	// // $geocoder->geocode(...);
	// // $geocoder->reverse(...);
	// // dd($this->input['postal_code']);
	// $httpAdapter = 'google_maps';
	// // $locale,
	// // $region,
	// $useSsl = true;
	// $apiKey = 'AIzaSyA5fV8LgO_EWYnBeU3C2ErFTEo6pmrHJcU';

	// $geocoder = new \Geocoder\Provider\GoogleMaps(
	//     $httpAdapter,
	//     // $locale,
	//     // $region,
	//     $useSsl, // true|false
	//     $apiKey 
	// );

	// dd($geocoder->all());

	// return View::make('garbagetest');
});




