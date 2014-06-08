<<<<<<< HEAD
<?php

class Profile extends Eloquent{

	public static $rules = array(
	  //TO-DO
	 );
	
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';
	protected $primaryKey = 'id';
	
	/**
	 * @return Relationships
     */
     public function users()
     {
		return $this->hasMany('User');
     }
     public function permissions()
     {
		return $this->belongsToMany('Permission',  'permissions_profiles');
     }
=======
<?php

class Profile extends Eloquent{

	public static $rules = array(
	  //TO-DO
	 );
	
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';
	protected $primaryKey = 'id';
	
	/**
	 * @return Relationships
     */
     public function users()
     {
		return $this->hasMany('User');
     }
     public function permissions()
     {
		return $this->belongsToMany('Permission',  'permissions_profiles');
     }
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}