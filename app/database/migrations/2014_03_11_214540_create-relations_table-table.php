<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTableTable extends Migration {

	/**
	 * Run the migrations for the relationships.
	 *
	 * @return void
	 */
	public function up()
	{
		//Relationships for user;
		Schema::table('users', function($table)
		{
			//Relationships
			$table	->	foreign('profile_id')
					->	references('id')->on('profiles')
					->	onDelete('cascade');
					//->	unsigned()->default(2)

			$table	->	foreign('language_id')
					->	references('id')->on('languages')
					//->	unsigned()->default(1)
					->	onDelete('cascade');
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
	}

}
