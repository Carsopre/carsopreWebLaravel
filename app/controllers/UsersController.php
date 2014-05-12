<?php
use User as User;
class UsersController extends BaseController {

	
	protected $layout = "layouts.main";
	private $user = NULL;

	public function __construct()
	{
	  $this->beforeFilter('csrf', array('on'=>'post'));
	  $this->beforeFilter('auth',	array('only'=>array('getDashboard')));
	 
    }

	public function index()
	{
		$users = User::all();
		$this->layout->content = View::make('users.list', array('users' => $users));	
	}
}