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

Route::get('/', 'HomeController@hiya');
Route::get('/form', 'HomeController@testForm');

Route::post('/store', 'RunsController@store');
Route::get('/show', 'RunsController@show');
Route::get('/result{id}', 'RunsController@result');
Route::get('/garbagetest', function() {
	
	$run1 = new Run();
	$run1 = Run::find(1);
	$api1 = new Api();
	$api1->inputs = $run1->run['api_input'];
	$request = $api1->eui();
	return View::make('garbagetest')->with('junk',$request);
});




