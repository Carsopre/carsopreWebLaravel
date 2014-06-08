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

}