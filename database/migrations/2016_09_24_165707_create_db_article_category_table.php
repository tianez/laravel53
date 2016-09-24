<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbArticleCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_article_category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('category_name');
			$table->string('category_ico')->nullable();
			$table->text('category_des')->nullable();
			$table->integer('pid')->default(0);
			$table->string('taxonomy')->default('category');
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
		Schema::drop('db_article_category');
	}

}
