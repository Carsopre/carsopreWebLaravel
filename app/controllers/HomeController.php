<<<<<<< HEAD
<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout = "layouts.main";
	private $user = NULL;
	
	public function index()
	{
		return View::make('layouts.home');
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

=======
<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout = "layouts.main";
	private $user = NULL;
	
	public function index()
	{
		return View::make('layouts.home');
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}