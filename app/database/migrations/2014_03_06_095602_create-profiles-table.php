<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if (Schema::hasTable('profiles'))	$this->down();
		
		Schema::create('profiles', function($table){
			$table	-> engine='InnoDB';
			//Primary Key
			$table->increments('id');
			//Standard
			$table->string('name', 64)->unique();
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
		Schema::drop('profiles');
	}

}
