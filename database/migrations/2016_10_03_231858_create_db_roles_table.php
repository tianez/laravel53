<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique('roles_name_unique')->comment("用户组名");
			$table->string('display_name')->comment("显示名称");
			$table->string('thumb')->nullable()->comment("用户组头像");
			$table->text('description', 65535)->nullable()->comment("用户组描述");
			$table->boolean('status')->default(0)->comment("状态，0：正常，1：锁定");
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
		Schema::drop('db_roles');
	}

}
