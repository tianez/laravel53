<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key')->comment("字段key");
			$table->string('title')->comment("字段名称");
			$table->string('type')->comment("字段形式");
			$table->string('f_module')->nullable()->comment("所属模块");
			$table->string('f_groups')->nullable()->comment("字段分组");
			$table->text('f_description', 65535)->nullable()->comment("字段描述");
			$table->text('f_options', 65535)->nullable()->comment("字段设置");
			$table->string('f_ext')->nullable()->comment("字段扩展");
			$table->string('f_default')->nullable()->comment("默认值");
			$table->string('f_add')->default('[1]')->comment("新增权限");
			$table->string('f_edit')->default('[1]')->comment("编辑权限");
			$table->string('f_visible')->default('[1]')->comment("可见权限");
			$table->integer('order')->default(0)->comment("排序");
			$table->boolean('status')->default(0)->comment("状态，0：正常，1：锁定");
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_fields');
	}

}
