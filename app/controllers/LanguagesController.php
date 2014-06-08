<?php

class LanguagesController extends \BaseController {

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
		if( ! $us->hasPermission(31))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$lang = Language::all();
		$us = Auth::user();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'language',
				'table_title'	=> 'Languages',
				'table_header'	=> array( 'ID', 'Enabled', 'Locale', 'Name', 'Flag'),
				'table_content' => $lang,
				'table_columns' => array( 'id', 'enabled', 'locale', 'name', 'flag'),
				'perm_cre'	=> $us->hasPermission(30),
				'perm_upd'	=> $us->hasPermission(32) AND ++$actions,
				'perm_del'	=> $us->hasPermission(33) AND ++$actions,
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
		if( ! $us->hasPermission(30))
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
		if( ! $us->hasPermission(32))
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
		if( ! $us->hasPermission(33))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
				
		$it = Language::find($id);
		$it->delete();

		return Redirect::to('languages')
				->with('type', 'alert')
				->with('message', 'Language successfully deleted');
	}

}