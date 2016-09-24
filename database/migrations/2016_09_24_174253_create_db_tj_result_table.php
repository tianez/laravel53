<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbTjResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_tj_result', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('tj_id')->comment("体检单号");
			$table->string('item')->comment("体检项目");
			$table->string('result')->comment("项目结果");
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
		Schema::drop('db_tj_result');
	}

}
