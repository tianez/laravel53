<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbUser2sTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_user2s', function(Blueprint $table)
		{
			$table->string('user_name', 100);
			$table->string('id', 50)->default('')->primary();
			$table->bigInteger('createdAt');
			$table->bigInteger('updatedAt');
			$table->bigInteger('version');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_user2s');
	}

}
