<?php

class Gconfig extends Eloquent {

	public static $rules = array(
		'project_name'=>'required|between:3,64',
		//'project_abstract'=>'required|between:3,64',
		//'project_logo'=>'between:3,64',
		'contact_name'=>'required|between:3,64',
		'contact_email'=>'email'
		//'contact_facebook'=>'between:3,64',
		//'contact_linkedin'=>'between:3,64',
		//'contact_twitter'=>'between:3,64',
		//'contact_abstract'=>'between:3,64',
	 );

	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gconfigs';
	protected $primaryKey = 'id';
	
}
