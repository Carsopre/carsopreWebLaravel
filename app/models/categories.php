<<<<<<< HEAD
<?php

class Category extends Eloquent {

	public static $rules = array(
		'name'=>'required|alpha|between:3,64|unique:categories',
		'description'=>'alpha_num'
	 );
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	protected $primaryKey = 'id';
	
	public function sections()
	{
		return $this->hasMany('Section');
	}

	public static function getIDCategory($cat)
	{
		return Category::where('name', '=', $cat)->first();
	}
=======
<?php

class Category extends Eloquent {

	public static $rules = array(
		'name'=>'required|alpha|between:3,64|unique:categories',
		'description'=>'alpha_num'
	 );
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	protected $primaryKey = 'id';
	
	public function sections()
	{
		return $this->hasMany('Section');
	}

	public static function getIDCategory($cat)
	{
		return Category::where('name', '=', $cat)->first();
	}
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}