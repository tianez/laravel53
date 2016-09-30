<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_jobs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('queue');
			$table->text('payload', 65535);
			$table->boolean('attempts');
			$table->integer('reserved_at')->unsigned()->nullable();
			$table->integer('available_at')->unsigned();
			$table->integer('created_at')->unsigned();
			$table->index(['queue','reserved_at'], 'jobs_queue_reserved_at_index');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_jobs');
	}

}
