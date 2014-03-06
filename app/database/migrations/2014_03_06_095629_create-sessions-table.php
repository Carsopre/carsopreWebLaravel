<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('sessions',  function($table){
			$table->increments('id')->default(0);
			$table->varchar('ip_address',  16)->default(0);
			$table->varchar('user_agent',  120);
			$table->integer('last_activity', 10)->unsigned()->default(0);
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
		//
		Schema::drop('sessions');
	}

}
