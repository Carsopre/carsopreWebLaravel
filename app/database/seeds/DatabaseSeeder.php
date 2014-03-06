<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
// 		Eloquent::unguard();
		$tables = array(
			'categories' ,
		);
		
		foreach ($tables as $table) {
			DB::table($table)->truncate();
		}
		
		$this->call('CategoryTableSeeder');
		$this->command->info('CategoriesTable added');
		
	}

}
class CategoryTableSeeder extends Seeder {
	/**
	 * Inserts the default categories
	 *
	 * @return void
	 */
	public function run()
	{
		Category::create(
		array('id' 	=> 	'1',	'name'	=>	'Web'),
		array('id' 	=> 	'2',	'name'	=>	'Curriculum Vitae'),
		array('id' 	=> 	'3',	'name'	=>	'Portfolio'),
		array('id' 	=> 	'4',	'name'	=>	'Contact')
		);
	}
}
class LanguageTableSeeder extends Seeder {
	/**
	 * Inserts the default Languages
	 *
	 * @return void
	 */
	public function run()
	{
		Language::create(
		array(
			'id' 		=> 	'1',
			'locale'	=>	'es_ES',
			'name'		=>	'Español',
			'flag'		=>	'es.png',
			'enabled'	=>	'0'),
		array(
			'id' 		=> 	'2',
			'locale'	=>	'en_US',
			'name'		=>	'English',
			'flag'		=>	'us.png',
			'enabled'	=>	'1')
		);
	}
}
class PermissionTableSeeder extends Seeder {
	/**
	 * Inserts the default Permissions
	 *
	 * @return void
	 */
	public function run()
	{
		Permission::create(
		// -- Users
		array('id' 	=> 	1,	'name'	=>	'Create Users'),
		array('id' 	=> 	2,	'name'	=>	'Read Users'),
		array('id' 	=> 	3,	'name'	=>	'Update Users'),
		array('id' 	=> 	4,	'name'	=>	'Delete Users'),
		// -- Profiles
		array('id' 	=> 	10,	'name'	=>	'Create Profiles'),
		array('id' 	=> 	11,	'name'	=>	'Read Profiles'),
		array('id' 	=> 	12,	'name'	=>	'Update profiles'),
		array('id' 	=> 	13,	'name'	=>	'Delete profiles')
		);
	}
}
class ProfileTableSeeder extends Seeder {
	/**
	 * Inserts the default Profiles
	 *
	 * @return void
	 */
	public function run()
	{
		Profile::create(
		array('id' 	=> 	'1', 'name'	=>	'Admin' ), 
		array('id' 	=> 	'2', 'name'	=>	'User'), 
		array('id' 	=> 	'3', 'name'	=>	'Guest')
		);
	}
}
class Permissions_ProfileTableSeeder extends Seeder {
	/**
	 * Inserts the default categories
	 *
	 * @return void
	 */
	public function run()
	{
	 /* Admin profile has all permissions */
// INSERT INTO permissions_profiles (permission_id, profile_id) SELECT id, 1 FROM permissions WHERE id NOT IN (SELECT permission_id FROM permissions_profiles WHERE profile_id=1);
// 
// /* Al resto de momento unos especificos */
// INSERT INTO permissions_profiles (profile_id, permission_id) VALUES
// (2, 0),
// (2, 10);
// 		Permissions_Profile::create(
// 		array(
// 			'permission_id' 	=> 	'1',
// 			'name'	=>	'Web')
// 		));
	}
}
class UserTableSeeder extends Seeder {
	/**
	 * Inserts the default categories
	 *
	 * @return void
	 */
	public function run()
	{
		User::create(
		array(
			'id' 		=> 	'1',
			'username'	=>	'Admin',
			'email'		=>	'cssp1989@gmail.com',
			'password'	=>	'admin123',
			'profile_id'=>	'Web',
			'flag_id'	=>	'2',
			'enabled'	=>	'1')
		);
	}
}
