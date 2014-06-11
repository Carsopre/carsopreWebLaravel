<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public static $rules = array(
	  'username'=>'required|alpha|min:2',
	  'email'=>'required|email|unique:users,email',
	  'password'=>'required|alpha_num|between:6,12|confirmed',
	  'password_confirmation'=>'required|alpha_num|between:6,12'
	 );
	
	public static $unguarded = true;
	
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $hidden = array('password');

	/**
	 * 
	 * @return Relationships	
     */
	public function profile()
	{
		return $this->belongsTo('Profile');
	}
	
	public function language()
	{
		return $this->belongsTo('Language');
	}
	     
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	/**
	 * Get True or False depending on the user permissions
	 * @return bool
     */
	public function getPermissions()
	{
		
		return $this->permissions = array_fetch($this->profile->permissions->toArray(), 'id');
		//return $this->permissions = $this->profile->permissions->get()->all_to_single_array('id');		
	}

     public function hasPermission($perm)
     {
     	if( ! is_array($perm))
     		$perm = array($perm);
     	if( ! isset($this->permissions))
     		$this->getPermissions();
	if( in_array($perm, $this->permissions))
     		return true;
     	return false;     	
//return (0 == count(array_diff($perm, $this->permissions)));
		//return in_array($perm, array_fetch($this->profile->permissions->toArray(), 'id'));
     }
     public function hasAnyPermission($perm)
     {
     	if( ! is_array($perm))
     		$perm = array($perm);
     	if( ! isset($this->permissions))	
     		$this->getPermissions();

     	foreach($this->permissions as $p)
     	{
     		if(in_array($p, $perm))
     			return TRUE;
     	}
     	return FALSE;

     }
     
}
