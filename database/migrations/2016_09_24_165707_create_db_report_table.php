<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_report', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('sex')->nullable();
			$table->string('mingzu')->nullable();
			$table->string('danwei')->nullable();
			$table->string('phone')->nullable();
			$table->string('fangjian')->nullable();
			$table->string('jdr')->nullable();
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
		Schema::drop('db_report');
	}

}
