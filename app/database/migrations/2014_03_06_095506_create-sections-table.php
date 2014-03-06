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
		if (Schema::hasTable('sections'))	$this->down();
		
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
