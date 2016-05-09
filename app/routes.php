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
Route::get('/form', 'RunsController@create');
Route::post('/store', 'RunsController@store');
Route::get('/show', 'RunsController@show');
Route::get('/result{id}', 'RunsController@result');
Route::get('/show{id}','RunsController@show');
Route::get('/garbagetest', function() {
	
	$run1 = new Run();
	$run1 = Run::find(9);
	$api1 = new Api();
	$api1->input = $run1->run['api_input'];
	$request = $api1->eui();

	return View::make('garbagetest')->with('junk',$request);
});
Route::get('/pdftest', function(){
	$pdf = App::make('dompdf');
	// $pdf->loadHTML('<h1>margoober</h1>');
	$pdf->loadHTML(View::make('pdftest')->render());
	return $pdf->stream();
	// return View::make('pdftest');
});




