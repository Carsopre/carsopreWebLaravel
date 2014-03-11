<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateTablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Drop tables if exist
		if (Schema::hasTable('sections'))	$this->down();
		if (Schema::hasTable('categories'))	$this->down();
		if (Schema::hasTable('permissions_profiles'))	$this->down();
		if (Schema::hasTable('permissions'))	$this->down();
		if (Schema::hasTable('users'))		$this->down();
		if (Schema::hasTable('profiles'))	$this->down();
		if (Schema::hasTable('languages'))	$this->down();
		if (Schema::hasTable('sessions'))	$this->down();
		
		
		//Create tables
		Schema::create('sections',  function($table){
			$table->increments('id');
			$table->tinyInteger('category_id');
			$table->string('name', 128)->unique();
			$table->text('description');
			$table->tinyInteger('enabled')->unsigned()->default(1);
			$table->timestamps();
			
			//references
// 			$table->foreign('category')->references('id')->on('categories');
		});

		
		Schema::create('categories', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->string('name',  64)->unique();
			$table->text('description');
			$table->tinyInteger('enabled')->unsigned()->default(1);
			$table->timestamps();
		});

		Schema::create('permissions_profiles', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->tinyInteger('permission_id')->unsigned();
			$table->smallInteger('profile_id')->unsigned();
			$table->unique(array('permission_id', 'profile_id'));
		});
		
		Schema::create('permissions', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->string('name', 64)->unique();
		});
					
		Schema::create('profiles', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->string('name', 64)->unique();
			//Timestamps for Create - Update
			$table->timestamps();
		});
		
		Schema::create('languages', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->tinyInteger('enabled')->unsigned()->default(1);
			$table->string('locale', 5);
			$table->string('name', 16)->unique();
			$table->string('flag', 24);
			//Timestamps for Create - Update
			$table->timestamps();
		});

		Schema::create('users', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table	->	increments('id');
			//Standard
			$table	->	string('username', 20)->unique();
			$table	->	string('email', 100)->unique();
			$table	->	string('password', 64);
			$table	->	tinyInteger('profile_id')->unsigned();
			$table	->	tinyInteger('language_id')->unsigned();
			$table	->	tinyInteger('enabled')->unsigned()->default(1);
			//Timestamps for Create - Update
			$table->timestamps();
			//Relationships
			$table	->	foreign('profile_id')
					->	references('id')->	on('profiles');
			$table	->	foreign('language_id')
					->	references('id')->on('languages');
		});
		
		Schema::create('sessions',  function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->string('ip_address',  16)->default(0);
			$table->string('user_agent',  120);
			$table->integer('last_activity')->default(0);
			$table->text('user_data');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	 
		Schema::drop('sections');
		Schema::drop('categories');
		Schema::drop('permissions_profiles');
		Schema::drop('permissions');
		Schema::drop('users');
		Schema::drop('profiles');
		Schema::drop('languages');
		Schema::drop('sessions');
	}

}
