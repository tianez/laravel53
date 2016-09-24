<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbArticleMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_article_meta', function(Blueprint $table)
		{
			$table->increments('id')->comment("主键ID");
			$table->integer('article_id')->comment("文章id");
			$table->string('meta_key')->comment("字段名");
			$table->text('meta_value')->comment("字段值");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_article_meta');
	}

}
