<?php

class UsersController extends BaseController {

	
	protected $layout = "layouts.main";
	public function __construct()
	{
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	}
		
	public function showUsers()
	{
		$users = User::all();
		
		return View::make('users.list', array('users' => $users));
	}
	
	public function getLogin()
	{
	  $this->layout->content = View::make('users.login');
	}

	public function getRegister() {
	  $this->layout->content = View::make('users.register');
	}

	public function postCreate() {
	   $validator = Validator::make(Input::all(), User::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $user = new User;
		  $user->username = Input::get('username');
		  $user->email = Input::get('email');
		  $user->password = Hash::make(Input::get('password'));
		  $user->save();
		  return Redirect::to('portal')
				->with('type', 'success')
				->with('message', 'Thanks for registering!');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('users/register')
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
			return Redirect::to('users/dashboard')
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
	  $this->layout->content = View::make('users.dashboard');
	  
	}
	
		
	public function getLogout() {
	  Auth::logout();
	  return Redirect::to('portal')
			->with('type', 'success')
			->with('message', 'Your are now logged out!');
	}
}