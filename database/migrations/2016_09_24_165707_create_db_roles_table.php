<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique('roles_name_unique');
			$table->string('display_name');
			$table->string('thumb')->nullable();
			$table->text('description', 65535)->nullable();
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
		Schema::drop('db_roles');
	}

}
