<<<<<<< HEAD
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
=======
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
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}