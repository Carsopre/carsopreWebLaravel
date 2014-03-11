<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if (Schema::hasTable('languages'))	$this->down();
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('languages');
	}

}
