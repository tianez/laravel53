<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_article', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->unique('article_title_unique');
			$table->string('keyword')->nullable();
			$table->string('excerpt')->nullable();
			$table->string('thumb')->nullable();
			$table->text('content');
			$table->string('link')->nullable();
			$table->integer('cat_id')->default(0);
			$table->boolean('type')->nullable();
			$table->string('temp')->nullable();
			$table->integer('uid')->default(0);
			$table->integer('view')->default(0);
			$table->integer('bookmark')->default(0);
			$table->integer('comment')->default(0);
			$table->string('comment_status')->default('0');
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
		Schema::drop('db_article');
	}

}
