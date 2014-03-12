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

		Schema::create('sections',  function($table){
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->string('name', 128)->unique();
			$table->text('description');
			$table->tinyInteger('enabled')->unsigned()->default(1);
			$table->timestamps();
			//Relationships
			$table	->	foreign('category_id')
					->	references('id')->on('categories')
					->	onUpdate('cascade')
					->	onDelete('restrict');
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
			
		Schema::create('permissions_profiles', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->integer('permission_id')->unsigned();
			$table->integer('profile_id')->unsigned();
			$table->unique(array('permission_id', 'profile_id'));
			//Relationships
			$table	->	foreign('permission_id')
					->	references('id')->on('permissions')
					->	onUpdate('cascade')
					->	onDelete('restrict');
			$table	->	foreign('profile_id')
					->	references('id')->on('profiles')
					->	onUpdate('cascade')
					->	onDelete('restrict');
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
			$table	->	integer('profile_id')->unsigned();			
			$table	->	integer('language_id')->unsigned();
			$table	->	tinyInteger('enabled')->unsigned()->default(1);
			//Timestamps for Create - Update
			$table->timestamps();
			//Relationships
			$table	->	foreign('profile_id')
					->	references('id')->on('profiles')
					->	onUpdate('cascade')
					->	onDelete('restrict');
			$table	->	foreign('language_id')
					->	references('id')->on('languages')
					->	onUpdate('cascade')
					->	onDelete('restrict');
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
