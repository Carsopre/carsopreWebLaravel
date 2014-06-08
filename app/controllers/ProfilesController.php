<<<<<<< HEAD
<?php

class ProfilesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = "layouts.main";
	private $user = NULL;

	public function __construct()
	{
	  $this->beforeFilter('csrf', array('on'=>'post'));
	  $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	 
    }
	public function index()
	{
		//
		$us = Auth::user();
		if( ! $us->hasPermission(11))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$profiles = Profile::all();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'profiles',
				'table_title'	=> 'Profiles',
				'table_header'	=> array( 'ID', 'Name'),
				'table_content' => $profiles,
				'table_columns' => array( 'id', 'name'),
				'perm_cre'	=> $us->hasPermission(10),
				'perm_upd'	=> $us->hasPermission(12) AND ++$actions,
				'perm_del'	=> $us->hasPermission(13) AND ++$actions,
				'actions'	=> $actions
			));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$us = Auth::user();
		if( ! $us->hasPermission(10))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$this->layout->content = View::make('layouts.create',
			array(
				'class'	=> 'profiles',
				'title'	=> 'Create new Profile',
				'form'	=> array('url' => 'profiles', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'profilename', 'field', 'Username')
								)
			));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$us = Auth::user();
		if( ! $us->hasPermission(12))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$prof = Profile::find($id);
		$this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'profiles',
				'title'	=> 'Edit Profile',
				'class_item' 	=> $prof,
				'form'	=> array('route' => array('profiles.update', $prof->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Profile Name')
								)
			));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$us = Auth::user();
		if( ! $us->hasPermission(13))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$prof = Profile::find($id);
		$prof->delete();

		return Redirect::to('profiles')
				->with('type', 'alert')
				->with('message', 'Profile successfully deleted');
	}

=======
<?php

class ProfilesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = "layouts.main";
	private $user = NULL;

	public function __construct()
	{
	  $this->beforeFilter('csrf', array('on'=>'post'));
	  $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	 
    }
	public function index()
	{
		//
		$us = Auth::user();
		if( ! $us->hasPermission(11))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$profiles = Profile::all();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'profiles',
				'table_title'	=> 'Profiles',
				'table_header'	=> array( 'ID', 'Name'),
				'table_content' => $profiles,
				'table_columns' => array( 'id', 'name'),
				'perm_cre'	=> $us->hasPermission(10),
				'perm_upd'	=> $us->hasPermission(12) AND ++$actions,
				'perm_del'	=> $us->hasPermission(13) AND ++$actions,
				'actions'	=> $actions
			));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$us = Auth::user();
		if( ! $us->hasPermission(10))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$this->layout->content = View::make('layouts.create',
			array(
				'class'	=> 'profiles',
				'title'	=> 'Create new Profile',
				'form'	=> array('url' => 'profiles', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'profilename', 'field', 'Username')
								)
			));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$us = Auth::user();
		if( ! $us->hasPermission(12))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$prof = Profile::find($id);
		$this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'profiles',
				'title'	=> 'Edit Profile',
				'class_item' 	=> $prof,
				'form'	=> array('route' => array('profiles.update', $prof->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Profile Name')
								)
			));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$us = Auth::user();
		if( ! $us->hasPermission(13))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$prof = Profile::find($id);
		$prof->delete();

		return Redirect::to('profiles')
				->with('type', 'alert')
				->with('message', 'Profile successfully deleted');
	}

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}