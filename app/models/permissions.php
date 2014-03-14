<?php

class Permission extends Eloquent{

		public static $rules = array(
	 );
	
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permissions';
	protected $primaryKey = 'id';
	
	public function profiles()
	{
		return $this->belongsToMany('Profile',  'permissions_profiles');
	}

}