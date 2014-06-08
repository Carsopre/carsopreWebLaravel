<<<<<<< HEAD
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

=======
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

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}