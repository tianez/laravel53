<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbChatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_chat', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('username')->nullable();
			$table->string('user_id')->nullable();
			$table->string('head_img')->nullable();
			$table->string('time')->nullable();
			$table->text('content', 65535)->nullable();
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
		Schema::drop('db_chat');
	}

}
