<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique('permissions_name_unique')->comment("权限名");
			$table->string('display_name')->comment("权限显示名称");
			$table->string('group')->nullable()->comment("权限分组");
			$table->string('description')->nullable()->comment("权限描述");
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
		Schema::drop('db_permissions');
	}

}
