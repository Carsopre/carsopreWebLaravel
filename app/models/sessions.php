<?php

class Session extends Eloquent {

	public static $rules = array(
	 );
	
	public static $unguarded = true;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sessions';
}