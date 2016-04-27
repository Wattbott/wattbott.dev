<?php

/*
<<<<<<< HEAD

=======

Let's go!
>>>>>>> 65908a3cd2468044aff6856852b69f151cdbbad6
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
