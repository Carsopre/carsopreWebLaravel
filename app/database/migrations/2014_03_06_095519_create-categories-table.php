<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if (Schema::hasTable('categories'))	$this->down();
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('categories');
	}

}
