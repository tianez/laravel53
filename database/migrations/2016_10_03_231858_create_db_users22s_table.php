<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbUsers22sTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_users22s', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('user_name')->nullable();
			$table->string('password')->nullable();
			$table->bigInteger('version')->nullable();
			$table->dateTime('createdAt');
			$table->dateTime('updatedAt');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_users22s');
	}

}
