<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_config', function(Blueprint $table)
		{
			$table->increments('id')->comment("主键ID");
			$table->string('name')->unique()->nullable();
			$table->string('value')->nullable();
			$table->text('description')->nullable()->comment("说明");
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
		Schema::drop('db_config');
	}

}
