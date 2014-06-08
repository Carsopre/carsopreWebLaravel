<<<<<<< HEAD
<?php

class Language extends Eloquent{

	
	public static $rules = array(
		//TO-DO
	 );
	
	public static $unguarded = true;

	protected $table = 'languages';
	protected $primaryKey = 'id';
	
	public function users()
	{
		return $this->hasMany('User');
	}

=======
<?php

class Language extends Eloquent{

	
	public static $rules = array(
		//TO-DO
	 );
	
	public static $unguarded = true;

	protected $table = 'languages';
	protected $primaryKey = 'id';
	
	public function users()
	{
		return $this->hasMany('User');
	}

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}