<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbMeunTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_meun', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('link')->unique('meun_link_unique')->comment("菜单地址");
			$table->string('title')->unique('meun_title_unique')->comment("菜单标题");
			$table->string('icon')->nullable()->comment("菜单图标");
			$table->text('description', 65535)->nullable()->comment("菜单描述");
			$table->string('roles')->default('[1]')->comment("拥有权限的用户组");
			$table->integer('order')->default(0)->comment("排序");
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
		Schema::drop('db_meun');
	}

}
