<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbXbhTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_xbh', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username')->nullable();
			$table->string('sex')->nullable();
			$table->string('danwei')->nullable();
			$table->string('zhiwu')->nullable();
			$table->string('fanghao')->nullable();
			$table->string('checi')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_xbh');
	}

}
