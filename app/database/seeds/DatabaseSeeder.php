<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
		Eloquent::unguard();
        
        $tables = array(
        	'gconfigs',
			'categories',
			'permissions_profiles',
			'permissions',
			'users',
			'profiles',
			'languages'
		);

		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		foreach ($tables as $table) {			
			DB::table($table)->truncate();
		}
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
		
		$this->call('GconfigTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('LanguageTableSeeder');
		$this->call('PermissionTableSeeder');
		$this->call('ProfileTableSeeder');
		$this->call('Permissions_ProfileTableSeeder');
		$this->call('UserTableSeeder');

	}

}
class GconfigTableSeeder extends Seeder{
	/**
	 * Inserts the default configuration
	 *
	 * @return void
	 */
	public function run()
	{
// 		DB::table('categories')->delete();
		Gconfig::insert(array(
		array('id' 	=> 	'1',	'project_name'	=>	'Carsopre Projects')
		));				
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
// 		DB::table('categories')->delete();
		Category::insert(array(
		array('id' 	=> 	'1',	'name'	=>	'Web'),
		array('id' 	=> 	'2',	'name'	=>	'Curriculum Vitae'),
		array('id' 	=> 	'3',	'name'	=>	'Portfolio'),
		array('id' 	=> 	'4',	'name'	=>	'Contact')
		));		
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
// 		DB::table('languages')->delete();
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
// 		DB::table('permissions')->delete();	
		Permission::insert(array(
		// -- Users
		array('id' 	=> 	1,	'name'	=>	'Create Users'),
		array('id' 	=> 	2,	'name'	=>	'Read Users'),
		array('id' 	=> 	3,	'name'	=>	'Update Users'),
		array('id' 	=> 	4,	'name'	=>	'Delete Users'),
		// -- Profiles
		array('id' 	=> 	10,	'name'	=>	'Create Profiles'),
		array('id' 	=> 	11,	'name'	=>	'Read Profiles'),
		array('id' 	=> 	12,	'name'	=>	'Update Profiles'),
		array('id' 	=> 	13,	'name'	=>	'Delete Profiles'),
		// -- Permissions
		array('id' 	=> 	20,	'name'	=>	'Create Permissions'),
		array('id' 	=> 	21,	'name'	=>	'Read Permissions'),
		array('id' 	=> 	22,	'name'	=>	'Update Permissions'),
		array('id' 	=> 	23,	'name'	=>	'Delete Permissions'),
		// -- Languages
		array('id' 	=> 	30,	'name'	=>	'Create Languages'),
		array('id' 	=> 	31,	'name'	=>	'Read Languages'),
		array('id' 	=> 	32,	'name'	=>	'Update Languages'),
		array('id' 	=> 	33,	'name'	=>	'Delete Languages'),
		// -- Categories
		array('id' 	=> 	40,	'name'	=>	'Create Categories'),
		array('id' 	=> 	41,	'name'	=>	'Read Categories'),
		array('id' 	=> 	42,	'name'	=>	'Update Categories'),
		array('id' 	=> 	43,	'name'	=>	'Delete Categories'),
		// -- Sections
		array('id' 	=> 	50,	'name'	=>	'Create Sections'),
		array('id' 	=> 	51,	'name'	=>	'Read Sections'),
		array('id' 	=> 	52,	'name'	=>	'Update Sections'),
		array('id' 	=> 	53,	'name'	=>	'Delete Sections'),
		// -- Configuration
		array('id' 	=> 	60,	'name'	=>	'Create Configurations'),
		array('id' 	=> 	61,	'name'	=>	'Read Configurations'),
		array('id' 	=> 	62,	'name'	=>	'Update Configurations'),
		array('id' 	=> 	63,	'name'	=>	'Delete Configurations')
		));
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
// 		DB::table('profiles')->delete();
		Profile::insert(array(
		array('id' 	=> 	'1', 'name'	=>	'Admin' ), 
		array('id' 	=> 	'2', 'name'	=>	'User'), 
		array('id' 	=> 	'3', 'name'	=>	'Guest')
		));
		
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
		DB::statement('
			INSERT INTO permissions_profiles (permission_id, profile_id) 
			SELECT id, 1 
			FROM permissions 
			WHERE id NOT IN (
				SELECT permission_id 
				FROM permissions_profiles 
				WHERE profile_id=1
				);
		');
		
		//Insert just the basic, they can be modified afterwards in the app.
		Permissions_Profile::insert(array(
			//Profile '2' - User
			array('permission_id'	=>	'2', 'profile_id'	=>	'2'),	//Read Users
			array('permission_id'	=>	'11', 'profile_id'	=>	'2'),	//Read Profiles
			array('permission_id'	=>	'21', 'profile_id'	=>	'2'),	//Read Permissions
			array('permission_id'	=>	'31', 'profile_id'	=>	'2'),	//Read Languages
			array('permission_id'	=>	'41', 'profile_id'	=>	'2'),	//Read Categories
			array('permission_id'	=>	'50', 'profile_id'	=>	'2'),	//Create Sections
			array('permission_id'	=>	'51', 'profile_id'	=>	'2'),	//Read Sections
			//Profile '3' - Guest
			array('permission_id'	=>	'41', 'profile_id'	=>	'3'),	//Read Categories
			array('permission_id'	=>	'51', 'profile_id'	=>	'3')	//Read Sections
		));
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
// 		DB::table('users')->delete();
		User::create(
		array(
			'id' 			=> 	'1',
			'username'		=>	'Admin',
			'email'			=>	'cssp1989@gmail.com',
			'password'		=>	Hash::make('admin123'),
			'profile_id'	=>	'1',
			'language_id'	=>	'2',
			'enabled'		=>	'1')
		);
	}
}
