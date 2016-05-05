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
	
	$run3 = new Run();
	$run3 = Run::find(1);
	// $run3->hasEnergyData('gas');
	// $run3->hasEnergyData('elec');
	// $run3->totalMonths();
	// $run3->replaceMonths();
	dd($run3->run);
	dd($run3->missing_months);
	dd($run3->is_energy_data); 
	dd($run3->run['user_input']['energy_data']);
	$run2->totalMonths();
	return $run3->temp_energy_totals['elec'];
	// return View::make('garbagetest',['run',$run]);
});




