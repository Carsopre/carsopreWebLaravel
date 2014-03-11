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
		if (Schema::hasTable('sessions'))	$this->down();
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
		//
		Schema::drop('sessions');
	}

}
