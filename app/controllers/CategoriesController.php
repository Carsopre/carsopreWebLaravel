<<<<<<< HEAD
<?php

class CategoriesController extends \BaseController {

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
		if( ! $us->hasPermission(41))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$cat = Category::all();		
		$actions = 0;

		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'categories',
				'table_title'	=> 'Categories',
				'table_header'	=> array( 'ID', 'Name', 'Descritpion', 'enabled'),
				'table_content' => $cat,
				'table_columns' => array( 'id', 'name', 'description', 'enabled'),
				'perm_cre'	=> $us->hasPermission(40),
				'perm_rea'	=> $us->hasPermission(41) AND ++$actions,
				'perm_upd'	=> $us->hasPermission(42) AND ++$actions,
				'perm_del'	=> $us->hasPermission(43) AND ++$actions,
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
		if( ! $us->hasPermission(40))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		return $this->layout->content = View::make('layouts.create',
			array(
				'class'	=> 'Cateogry',
				'title'	=> 'Create new Category',
				'form'	=> array('url' => 'categories', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Category Name'),
								array('text', 'description', 'field', 'Description'),
								array('checkbox', 'enabled', 'checkbox', 'Enabled')
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
		$validator = Validator::make(Input::all(), Category::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $cat = new Category;
		  $cat->name = Input::get('name');
		  $cat->description = Input::get('description');
  		  $cat->enabled = Input::get('enabled');
		  $cat->save();
		  return Redirect::to('categories')
				->with('type', 'success')
				->with('message', 'New category created');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('categories/create')
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
		$cat = Category::find($id);
		$sect = Section::where('category_id', '=', $id)->get();
					
		return $this->layout->content = View::make('categories.'.strtolower($cat->name),
			array(
				/*'cat'	=>	$cat,
				'sect'	=>	$sect*/
				));
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
		if( ! $us->hasPermission(42))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		$cat = Category::find($id);
		$sect = Section::where('category_id', '=', $id)->get();
		$actions = 0;
		//$sect = Section::all();
		return $this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'categories',
				'title'	=> 'Edit Category',
				'class_item'	=> $cat,
				'class_sub_item' => 'sections',
				'sub_item'	=> $sect,
				'form'	=> array('route' => array('categories.update', $cat->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Category Name'),
								array('text', 'description', 'field', 'Description'),
								array('checkbox', 'enabled', 'checkbox', 'Enabled')
								),
				'perm_cre'	=> $us->hasPermission(50),
				'perm_rea'	=> $us->hasPermission(51),
				'perm_upd'	=> $us->hasPermission(52) AND ++$actions,
				'perm_del'	=> $us->hasPermission(53) AND ++$actions,
				'actions'	=> $actions
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
		$cat = Category::find($id);
		$validator = Validator::make(Input::all(), Category::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $cat->name = Input::get('name');
		  $cat->description = Input::get('description');
  		  $cat->enabled = Input::get('enabled');
		  $cat->save();
		  return Redirect::to('categories')
				->with('type', 'success')
				->with('message', 'Category edited');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('categories/'.$id.'/edit')
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
		if( ! $us->hasPermission(43))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		$it = Category::find($id);
		$it->delete();

		return Redirect::to('categories')
				->with('type', 'alert')
				->with('message', 'Category successfully deleted');
	}

=======
<?php

class CategoriesController extends \BaseController {

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
		if( ! $us->hasPermission(41))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');

		$cat = Category::all();		
		$actions = 0;

		$this->layout->content = View::make('layouts.index', 
			array(
				'class'		=> 'categories',
				'table_title'	=> 'Categories',
				'table_header'	=> array( 'ID', 'Name', 'Descritpion', 'enabled'),
				'table_content' => $cat,
				'table_columns' => array( 'id', 'name', 'description', 'enabled'),
				'perm_cre'	=> $us->hasPermission(40),
				'perm_rea'	=> $us->hasPermission(41) AND ++$actions,
				'perm_upd'	=> $us->hasPermission(42) AND ++$actions,
				'perm_del'	=> $us->hasPermission(43) AND ++$actions,
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
		if( ! $us->hasPermission(40))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		return $this->layout->content = View::make('layouts.create',
			array(
				'class'	=> 'Cateogry',
				'title'	=> 'Create new Category',
				'form'	=> array('url' => 'categories', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Category Name'),
								array('text', 'description', 'field', 'Description'),
								array('checkbox', 'enabled', 'checkbox', 'Enabled')
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
		$validator = Validator::make(Input::all(), Category::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $cat = new Category;
		  $cat->name = Input::get('name');
		  $cat->description = Input::get('description');
  		  $cat->enabled = Input::get('enabled');
		  $cat->save();
		  return Redirect::to('categories')
				->with('type', 'success')
				->with('message', 'New category created');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('categories/create')
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
		$cat = Category::find($id);
		$sect = Section::where('category_id', '=', $id)->get();
					
		return $this->layout->content = View::make('categories.'.strtolower($cat->name),
			array(
				/*'cat'	=>	$cat,
				'sect'	=>	$sect*/
				));
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
		if( ! $us->hasPermission(42))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		$cat = Category::find($id);
		$sect = Section::where('category_id', '=', $id)->get();
		$actions = 0;
		//$sect = Section::all();
		return $this->layout->content = View::make('layouts.edit',
			array(
				'class'	=> 'categories',
				'title'	=> 'Edit Category',
				'class_item'	=> $cat,
				'class_sub_item' => 'sections',
				'sub_item'	=> $sect,
				'form'	=> array('route' => array('categories.update', $cat->id), 'method' => 'PUT', 'class'=>'form-signup'),
				'field' => array(
								array('text', 'name', 'field', 'Category Name'),
								array('text', 'description', 'field', 'Description'),
								array('checkbox', 'enabled', 'checkbox', 'Enabled')
								),
				'perm_cre'	=> $us->hasPermission(50),
				'perm_rea'	=> $us->hasPermission(51),
				'perm_upd'	=> $us->hasPermission(52) AND ++$actions,
				'perm_del'	=> $us->hasPermission(53) AND ++$actions,
				'actions'	=> $actions
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
		$cat = Category::find($id);
		$validator = Validator::make(Input::all(), Category::$rules);
	
	    if ($validator->passes()) {
		// validation has passed, save user in DB
		  $cat->name = Input::get('name');
		  $cat->description = Input::get('description');
  		  $cat->enabled = Input::get('enabled');
		  $cat->save();
		  return Redirect::to('categories')
				->with('type', 'success')
				->with('message', 'Category edited');
	    } else {
		// validation has failed, display error messages  
		return Redirect::to('categories/'.$id.'/edit')
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
		if( ! $us->hasPermission(43))
			return Redirect::to('portal')
				->with('type', 'alert')
				->with('message', 'Not enough permissions');
		$it = Category::find($id);
		$it->delete();

		return Redirect::to('categories')
				->with('type', 'alert')
				->with('message', 'Category successfully deleted');
	}

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}