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
			$table->bigInteger('tj_id')->unique('tj_member_tj_id_unique');
			$table->string('tj_name');
			$table->string('password');
			$table->dateTime('c_time');
			$table->dateTime('a_time')->nullable();
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
