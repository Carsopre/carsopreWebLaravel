<?php

class PermissionsController extends \BaseController {

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
		$us = Auth::user();
		if( ! $us->hasPermission(21))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$perm = Permission::all();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'permission',
				'table_title'	=> 'Permissions',
				'table_header'	=> array( 'ID', 'Name'),
				'table_content' => $perm,
				'table_columns' => array( 'id', 'name'),
				'perm_cre'	=> $us->hasPermission(20),
				'perm_upd'	=> $us->hasPermission(22) AND ++$actions,
				'perm_del'	=> $us->hasPermission(23) AND ++$actions,
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
		//
		$us = Auth::user();
		if( ! $us->hasPermission(20))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
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
		if( ! $us->hasPermission(22))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
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
		if( ! $us->hasPermission(23))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		
		$it = Permission::find($id);
		$it->delete();

		return Redirect::to('permissions')
				->with('type', 'alert')
				->with('message', 'Permission successfully deleted');
	}

}