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
//Route::resource('sections', 'SectionsController');
Route::any('sections/{all}',function()
{
	return Redirect::to('portal');
})->where('all', '.*');
Route::any('sections',function()
{
	return Redirect::to('portal');
});

Route::resource('config', 'ConfigController');

Route::controller('portal', 'PortalController');
///////////////////////////////
Route::get('/', 'HomeController@index');
Route::get('portal', 'PortalController@index');
Route::get('test',function()
{
	return Redirect::to('portal/test');
});
Route::get('to-do',function()
{
	return Redirect::to('portal/to-do');
});

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