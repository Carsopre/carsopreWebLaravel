<<<<<<< HEAD
<?php
use User as User;
class UsersController extends \BaseController {

	
	protected $layout = "layouts.main";
	private $user = NULL;

	public function __construct()
	{
	  $this->beforeFilter('csrf', array('on'=>'post'));
	  $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	 
    }

	public function index()
	{
		$us = Auth::user();
		if( ! $us->hasPermission(2))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$users = User::all();
		$us = Auth::user();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'users',
				'table_title'	=> 'Users',
				'table_header'	=> array( 'ID', 'Username', 'E-mail', 'ProfileID'),
				'table_content' => $users,
				'table_columns' => array( 'id', 'username', 'email', 'profile_id'),
				'perm_cre'	=> $us->hasPermission(1),
				'perm_upd'	=> $us->hasPermission(3) AND ++$actions,
				'perm_del'	=> $us->hasPermission(4) AND ++$actions,
				'actions'	=> $actions
			));	
	}
	
	public function create()
	{
		$us = Auth::user();
		if( ! $us->hasPermission(1))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		return $this->layout->content = View::make('layouts.create',
			array(
				'class'	=> 'User',
				'title'	=> 'Create new User',
				'form'	=> array('url' => 'users', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'username', 'field', 'Username'),
								array('text', 'email', 'field', 'E-mail address'),
								array('password', 'password', 'field', 'Password'),
								array('password', 'password_confirmation', 'field', 'Confirm password')
								)
			));
	}
	public function store()
	{
	   	$validator = Validator::make(Input::all(), User::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $us = new User;
		  $us->username = Input::get('username');
		  $us->email = Input::get('email');
		  $us->password = Hash::make(Input::get('password'));
		  $us->save();
		  return Redirect::to('users')
				->with('type', 'success')
				->with('message', 'New user created');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('users/create')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }
	}

	public function show($id)
	{		
		return $this->layout->content = View::make('layouts.show',
			array(
				'class'	=> 'users',
				'title'	=> 'View User'
			));
	}

	public function edit($id)
	{
		$us = User::find($id);
		
		if( ! $us->hasPermission(3))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		return $this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'users',
				'title'	=> 'Edit User',
				'class_item'	=> $us,
				'form'	=> array('route' => array('users.update', $us->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'username', 'field', 'UsernameS'),
								array('text', 'email', 'field', 'E-mail address'),
								array('password', 'password', 'field', 'Password'),
								array('password', 'password_confirmation', 'field', 'Confirm password')
								)
			));
	}

	public function update($id)
	{
		$us = User::find($id);
	   	$validator = Validator::make(Input::all(), User::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $us->username = Input::get('username');
		  $us->email = Input::get('email');
		  $us->password = Hash::make(Input::get('password'));
		  $us->save();
		  return Redirect::to('users')
				->with('type', 'success')
				->with('message', 'User updated');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('users/'.$id.'/edit')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }		
	}

	public function destroy($id)
	{
		$us = User::find($id);
		if( ! $us->hasPermission(4))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$us->delete();

		return Redirect::to('users')
				->with('type', 'alert')
				->with('message', 'User successfully deleted');
	}

=======
<?php
use User as User;
class UsersController extends \BaseController {

	
	protected $layout = "layouts.main";
	private $user = NULL;

	public function __construct()
	{
	  $this->beforeFilter('csrf', array('on'=>'post'));
	  $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	 
    }

	public function index()
	{
		$us = Auth::user();
		if( ! $us->hasPermission(2))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$users = User::all();
		$us = Auth::user();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'users',
				'table_title'	=> 'Users',
				'table_header'	=> array( 'ID', 'Username', 'E-mail', 'ProfileID'),
				'table_content' => $users,
				'table_columns' => array( 'id', 'username', 'email', 'profile_id'),
				'perm_cre'	=> $us->hasPermission(1),
				'perm_upd'	=> $us->hasPermission(3) AND ++$actions,
				'perm_del'	=> $us->hasPermission(4) AND ++$actions,
				'actions'	=> $actions
			));	
	}
	
	public function create()
	{
		$us = Auth::user();
		if( ! $us->hasPermission(1))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		return $this->layout->content = View::make('layouts.create',
			array(
				'class'	=> 'User',
				'title'	=> 'Create new User',
				'form'	=> array('url' => 'users', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'username', 'field', 'Username'),
								array('text', 'email', 'field', 'E-mail address'),
								array('password', 'password', 'field', 'Password'),
								array('password', 'password_confirmation', 'field', 'Confirm password')
								)
			));
	}
	public function store()
	{
	   	$validator = Validator::make(Input::all(), User::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $us = new User;
		  $us->username = Input::get('username');
		  $us->email = Input::get('email');
		  $us->password = Hash::make(Input::get('password'));
		  $us->save();
		  return Redirect::to('users')
				->with('type', 'success')
				->with('message', 'New user created');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('users/create')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }
	}

	public function show($id)
	{		
		return $this->layout->content = View::make('layouts.show',
			array(
				'class'	=> 'users',
				'title'	=> 'View User'
			));
	}

	public function edit($id)
	{
		$us = User::find($id);
		
		if( ! $us->hasPermission(3))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		return $this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'users',
				'title'	=> 'Edit User',
				'class_item'	=> $us,
				'form'	=> array('route' => array('users.update', $us->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'username', 'field', 'UsernameS'),
								array('text', 'email', 'field', 'E-mail address'),
								array('password', 'password', 'field', 'Password'),
								array('password', 'password_confirmation', 'field', 'Confirm password')
								)
			));
	}

	public function update($id)
	{
		$us = User::find($id);
	   	$validator = Validator::make(Input::all(), User::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $us->username = Input::get('username');
		  $us->email = Input::get('email');
		  $us->password = Hash::make(Input::get('password'));
		  $us->save();
		  return Redirect::to('users')
				->with('type', 'success')
				->with('message', 'User updated');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('users/'.$id.'/edit')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }		
	}

	public function destroy($id)
	{
		$us = User::find($id);
		if( ! $us->hasPermission(4))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$us->delete();

		return Redirect::to('users')
				->with('type', 'alert')
				->with('message', 'User successfully deleted');
	}

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}