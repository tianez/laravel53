<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('role')->default(0);
			$table->string('user_name')->unique('users_user_name_unique');
			$table->string('email')->unique('users_email_unique');
			$table->string('password', 60);
			$table->string('real_name')->nullable();
			$table->string('china_id')->nullable();
			$table->string('head_img')->nullable();
			$table->string('office_phone')->nullable();
			$table->string('mobile_phone')->nullable();
			$table->string('qq')->nullable();
			$table->boolean('sex')->default(1);
			$table->integer('score')->default(0);
			$table->string('job')->nullable();
			$table->string('team')->nullable();
			$table->integer('company_id')->default(0);
			$table->string('remarks')->nullable();
			$table->boolean('status')->default(0);
			$table->integer('login_totals')->default(0);
			$table->string('reg_ip')->default('0.0.0.0');
			$table->string('last_login_ip')->default('0.0.0.0');
			$table->integer('uid')->default(0);
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('db_users');
	}

}
