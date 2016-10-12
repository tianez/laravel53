<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbTjMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_tj_member', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('tj_id')->unique('tj_member_tj_id_unique')->comment("体检单号");
			$table->string('tj_name')->comment("体检用户名");
			$table->string('password')->comment("查询密码");
			$table->dateTime('c_time')->comment("体检时间");
			$table->dateTime('a_time')->nullable()->comment("报告时间");
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
		Schema::drop('db_tj_member');
	}

}
