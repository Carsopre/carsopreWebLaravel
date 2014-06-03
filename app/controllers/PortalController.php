<?php

class PortalController extends \BaseController {

	protected $layout = "layouts.main";
	private $user = NULL;

	public function __construct()
	{
	  $this->beforeFilter('csrf', array('on'=>'post'));
	  $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	 
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if(Auth::guest()) //If the user is logged then go to the dashboard
			return View::make('portal/portal');
		else
			return Redirect::to('portal/dashboard');
	}

	public function getLogin()
	{
	  //patch to avoid entering to login once logged in
		if(Auth::guest())
			$this->layout->content = View::make('portal.login');
		else
			return Redirect::to('portal/dashboard')
					->with('type', 'alert')
					->with('message', 'You are already logged in!');
	}

	public function getRegister() {
	  //patch to avoid entering to login once logged in
		if(Auth::guest())
			$this->layout->content = View::make('portal.register');
		else
			return Redirect::to('portal/dashboard')
					->with('message', 'You can`t register an account while logged!');
	}

	public function getTest() {
		$this->layout->content = View::make('test');
	}

	public function getToDo() {
		$this->layout->content = View::make('to-do');
	}

	public function postCreate() {
	   $validator = Validator::make(Input::all(), User::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $us = new User;
		  $us->username = Input::get('username');
		  $us->email = Input::get('email');
		  $us->password = Hash::make(Input::get('password'));
		  $us->save();
		  return Redirect::to('portal')
				->with('type', 'success')
				->with('message', 'Thanks for registering!');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('portal/register')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }
	}

	public function postSignin()
	{

		$username = Input::get('username');
		$credentials = array(
			'username' 	=>Input::get('username'), 
			'password'	=>Input::get('password')
		);
		
		if (Auth::attempt($credentials)){
			
			return Redirect::to('portal/dashboard')
				->with('type', 'success')
				->with('message', sprintf('Welcome %s to your Dashboard', $username));
		} else {
			return Redirect::to('portal')
				->with('type', 	'alert')
				->with('message',	'Your username/password combination was incorrect')
				->withInput();
		}
	}
	
	public function getDashboard(){
	  $this->layout->content = View::make('portal.dashboard');
	  
	}

	public function getLogout() {
	  Auth::logout();
	  return Redirect::to('portal')
			->with('type', 'success')
			->with('message', 'Your are now logged out!');
	}


}