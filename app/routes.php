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
Route::get('/result{id}', 'RunsController@result');
Route::get('/garbagetest', function() {
	
	$run2 = new Run();
	$run2 = Run::find(1);
	$run2->hasEnergyData('gas');
	dd($run2->is_energy_data['gas']);
	$run2->totalMonths();
	return $run2->temp_energy_totals['elec'];
	// return View::make('garbagetest',['run',$run]);
});




