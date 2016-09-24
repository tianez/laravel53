<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbRolePermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_role_permission', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned()->index('role_permission_role_id_foreign');
			$table->integer('permission_id')->unsigned();
			$table->primary(['permission_id','role_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_role_permission');
	}

}
