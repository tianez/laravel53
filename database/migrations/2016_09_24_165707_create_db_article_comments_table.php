<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbArticleCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_article_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id');
			$table->text('content', 65535);
			$table->integer('pid');
			$table->integer('author_id');
			$table->string('author_name');
			$table->string('author_email');
			$table->string('author_url');
			$table->string('author_ip');
			$table->string('type');
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
		Schema::drop('db_article_comments');
	}

}
