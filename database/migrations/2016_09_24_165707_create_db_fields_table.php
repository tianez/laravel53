<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key');
			$table->string('title');
			$table->string('type');
			$table->string('f_module')->nullable();
			$table->string('f_groups')->nullable();
			$table->text('f_description', 65535)->nullable();
			$table->text('f_options', 65535)->nullable();
			$table->string('f_ext')->nullable();
			$table->string('f_default')->nullable();
			$table->string('f_add')->default('[1]');
			$table->string('f_edit')->default('[1]');
			$table->string('f_visible')->default('[1]');
			$table->integer('order')->default(0);
			$table->boolean('status')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_fields');
	}

}
