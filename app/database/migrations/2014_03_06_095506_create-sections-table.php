<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('sections',  function($table){
			$table->increments('id')->primary();
			$table->tinyint('category_id');
			$table->varchar('name', 128)->unique();
			$table->text('description');
			$table->tinyint('enabled')->unsigned()->default(1);
			$table->timestamps();
			
			//references
// 			$table->foreign('category')->references('id')->on('categories');
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
		Schema::drop('sections');
	}

}
