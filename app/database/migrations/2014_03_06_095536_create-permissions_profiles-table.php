<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('permissions_profiles', function($table){
			$table->increments('id');
			$table->tinyint('permission_id')->unsigned();
			$table->smallint('profile_id')->unsigned();
			$table->unique(array('permission_id', 'profile_id'));
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
		Schema::drop('permissions_profiles');
	}

}
