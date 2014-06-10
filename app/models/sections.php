<?php

class Section extends Eloquent{

	public static $rules = array(
		'name'=>'required|alpha_spaces|between:3,64|unique:categories',
		'description'=>'required|min:10'
	 );
	
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sections';
	protected $primaryKey = 'id';

	public function category()
	{
		return $this->belongsTo('Category');
	}
}