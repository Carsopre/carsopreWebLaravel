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
}