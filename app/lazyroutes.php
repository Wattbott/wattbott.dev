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
Route::post('/result', 'RunsController@result');
Route::get('/garbagetest', function() {

	return View::make('garbagetest');
});




