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

Route::controller('users', 'UsersController');

Route::get('/', 'HomeController@index');

Route::get('portal',function()
{
	if(Auth::guest()) //If the user is logged then go to the dashboard
		return View::make('portal/portal');
	else
		return Redirect::to('users/dashboard');
});



Route::get('login',function()
{
	return Redirect::to('users/login');
});
Route::get('register',function()
{	
	return Redirect::to('users/register');
});

//Route::get('users', array('uses' => 'UsersController@showUsers'));