<?php

class CategoryTableSeeder extends Seeder {
	/**
	 * Inserts the default categories
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->delete();
		Category::insert(array(
		array('id' 	=> 	'1',	'name'	=>	'Web'),
		array('id' 	=> 	'2',	'name'	=>	'Curriculum Vitae'),
		array('id' 	=> 	'3',	'name'	=>	'Portfolio'),
		array('id' 	=> 	'4',	'name'	=>	'Contact')
		));
		$this->command->info('CategoriesTable entries added');
		$this->call('LanguageTableSeeder');
		
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
		DB::table('languages')->delete();
		Language::insert(array(
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
		));
		
		$this->call('PermissionTableSeeder');
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
		DB::table('permissions')->delete();	
		Permission::insert(array(
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
		));
		
		$this->call('ProfileTableSeeder');
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
		DB::table('profiles')->delete();
		Profile::insert(array(
		array('id' 	=> 	'1', 'name'	=>	'Admin' ), 
		array('id' 	=> 	'2', 'name'	=>	'User'), 
		array('id' 	=> 	'3', 'name'	=>	'Guest')
		));
		
		$this->call('Permissions_ProfileTableSeeder');
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
		$this->call('UserTableSeeder');
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
		DB::table('users')->delete();
		User::create(
		array(
			'id' 			=> 	'1',
			'username'		=>	'Admin',
			'email'			=>	'cssp1989@gmail.com',
			'password'		=>	'admin123',
			'profile_id'	=>	'Web',
			'language_id'	=>	'2',
			'enabled'		=>	'1')
		);
		$this->command->info('UserTable entries added');
	}
}
