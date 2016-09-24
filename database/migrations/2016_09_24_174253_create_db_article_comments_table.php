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
			$table->increments('id')->comment("主键ID");
			$table->integer('article_id')->comment("文章id");
			$table->text('content', 65535)->comment("评论内容");
			$table->integer('pid')->comment("上级评论id");
			$table->integer('author_id')->comment("评论者id");
			$table->string('author_name')->comment("评论者名称");
			$table->string('author_email')->comment("评论者邮箱");
			$table->string('author_url')->comment("评论者网址");
			$table->string('author_ip')->comment("评论者IP");
			$table->string('type')->comment("评论所属模型");
			$table->boolean('status')->default(0)->comment("状态,0:正常,1:锁定");
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
