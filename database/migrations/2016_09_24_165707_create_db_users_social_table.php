<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbUsersSocialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_users_social', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid');
			$table->string('openid');
			$table->string('nickname');
			$table->boolean('sex')->default(1);
			$table->string('city');
			$table->string('province');
			$table->string('country');
			$table->string('headimgurl');
			$table->string('subscribe_time');
			$table->string('plat');
			$table->boolean('status')->default(1);
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
		Schema::drop('db_users_social');
	}

}
