<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbArticleTaxonomyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_article_taxonomy', function(Blueprint $table)
		{
			$table->integer('article_id')->comment("文章id");
			$table->integer('cat_id')->comment("分类id");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_article_taxonomy');
	}

}
