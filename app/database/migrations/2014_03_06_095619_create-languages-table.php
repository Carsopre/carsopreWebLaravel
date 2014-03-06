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
		Schema::create('languages', function($table){
			$table->increments('id');
			$table->tinyint('enabled')->unsigned()->default(1);
			$table->char('locale', 5);
			$table->varchar('name', 16)->unique();
			$table->varchar('flag', 24);
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
