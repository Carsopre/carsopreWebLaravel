<?php

class SectionsController extends \BaseController {

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
		if( ! $us->hasPermission(51))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$sec = Section::all();
		$us = Auth::user();
		$actions = 0;
		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'sections',
				'table_title'	=> 'Sections',
				'table_header'	=> array( 'ID', 'Name', 'Descritpion', 'enabled'),
				'table_content' => $sec,
				'table_columns' => array( 'id', 'name', 'description', 'enabled'),
				'perm_cre'	=> $us->hasPermission(50),
				'perm_upd'	=> $us->hasPermission(52) AND ++$actions,
				'perm_del'	=> $us->hasPermission(53) AND ++$actions,
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
		if( ! $us->hasPermission(50))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$cat = Category::all();
		return $this->layout->content = View::make('layouts.create',
		array(
			'class'	=> 'Section',
			'title'	=> 'Create new Section',
			'form'	=> array('url' => 'sections', 'class'=>'form-signup'),
			'field' => array(
							array('text', 'name', 'field', 'Section Name'),
							array('textarea', 'description', 'field', 'Description'),
							array('checkbox', 'enabled', 'checkbox', 'Enabled')),
			'sel'	=>	'category',
			'sel_it'=>	$cat
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
				//
		$validator = Validator::make(Input::all(), Section::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $sec = new Section;
		  $sec->name = Input::get('name');
		  $sec->description = Input::get('description');
  		  $sec->enabled = Input::get('enabled');
  		  $sec->category_id = Input::get('category_id');
		  $sec->save();
		  return Redirect::to('sections')
				->with('type', 'success')
				->with('message', 'New section created');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('sections/create')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }
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
		if( ! $us->hasPermission(52))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		//
		$sec = Section::find($id);
		$cat = Category::all();
		
		//$sect = Section::all();
		return $this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'sections',
				'title'	=> 'Edit Section',
				'class_item'	=> $sec,
				'form'	=> array('route' => array('sections.update', $sec->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Section Name'),
								array('textarea', 'description', 'field', 'Description'),
								array('checkbox', 'enabled', 'checkbox', 'Enabled')),
				'sel'	=>	'category',
				'sel_it'=>	$cat,
				'sel_pred'=> $sec->category_id
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
		$sec = Section::find($id);
		$validator = Validator::make(Input::all(), Section::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $sec->name = Input::get('name');
		  $sec->description = Input::get('description');
  		  $sec->enabled = Input::get('enabled');
  		  $sec->category_id = Input::get('category_id');
		  $sec->save();
		  return Redirect::to('sections')
				->with('type', 'success')
				->with('message', 'Section edited');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('sections/'.$id.'/edit')
				->with('type', 'alert')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();

	    }
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
		if( ! $us->hasPermission(53))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$it = Section::find($id);

		$it->delete();

		return Redirect::to('sections')
				->with('type', 'alert')
				->with('message', 'Section successfully deleted');
	}

}