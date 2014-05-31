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

Route::resource('users', 'UsersController');
Route::resource('profiles', 'ProfilesController');
Route::resource('categories', 'CategoriesController');
Route::resource('languages', 'LanguagesController');
Route::resource('permissions', 'PermissionsController');
Route::resource('sections', 'SectionsController');
Route::resource('config', 'ConfigController');

Route::controller('portal', 'PortalController');
///////////////////////////////
Route::get('/', 'HomeController@index');
Route::get('portal', 'PortalController@index');
Route::get('test',function()
{
	return Redirect::to('portal/test');
});
//Route::get('users', 'UsersController@index');
Route::get('profiles', 'ProfilesController@index');
Route::get('login',function()
{
	return Redirect::to('portal/login');
});
Route::get('register',function()
{	
	return Redirect::to('portal/register');
});
///////////////////////////////////
//Route::get('users', array('uses' => 'UsersController@showUsers'));