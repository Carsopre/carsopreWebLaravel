<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	 if (Schema::hasTable('users'))	$this->down();
		
		Schema::create('users', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table	->	increments('id');
			//Standard
			$table	->	string('username', 20)->unique();
			$table	->	string('email', 100)->unique();
			$table	->	string('password', 64);
			$table	->	unsignedInteger('profile_id');
			$table	->	tinyInteger('language_id')->unsigned();
			$table	->	tinyInteger('enabled')
					->	unsigned()->default(1);
			//Timestamps for Create - Update
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');
	}

}