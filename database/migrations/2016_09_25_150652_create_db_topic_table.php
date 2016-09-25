<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbTopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_topic', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('title')->nullable();
			$table->text('content', 65535)->nullable();
			$table->boolean('status')->default(0)->comment("状态，0：正常，1：锁定");
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
		Schema::drop('db_topic');
	}

}
