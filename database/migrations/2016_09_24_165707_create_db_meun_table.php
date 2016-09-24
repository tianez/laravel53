<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbMeunTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_meun', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('link')->unique('meun_link_unique');
			$table->string('title')->unique('meun_title_unique');
			$table->string('icon')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('roles')->default('[1]');
			$table->integer('order')->default(0);
			$table->boolean('status')->default(0);
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
		Schema::drop('db_meun');
	}

}
