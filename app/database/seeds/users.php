<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
// 	 		DB::table('profiles')
// 			->insert(
// 				array(
// 					'id' 		=> 	'1', 
// 					'username'	=>	'Admin', 
// 					'email'		=> 	'admin@admin.com', 
// 					
// 				  ));
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
	}

}