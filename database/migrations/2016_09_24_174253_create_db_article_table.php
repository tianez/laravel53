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
			$table->increments('id')->comment("主键ID");
			$table->string('title')->unique('article_title_unique')->comment("标题");
			$table->string('keyword')->nullable()->comment("关键词");
			$table->string('excerpt')->nullable()->comment("简介");
			$table->string('thumb')->nullable()->comment("缩略图");
			$table->text('content')->comment("内容");
			$table->string('link')->nullable()->comment("外链");
			$table->integer('cat_id')->default(0)->comment("所属分类");
			$table->boolean('type')->nullable()->comment("类型");
			$table->string('temp')->nullable()->comment("模板");
			$table->integer('uid')->default(0)->comment("作者ID");
			$table->integer('view')->default(0)->comment("浏览次数");
			$table->integer('bookmark')->default(0)->comment("收藏数");
			$table->integer('comment')->default(0)->comment("评论数");
			$table->string('comment_status')->default('0')->comment("评论状态");
			$table->integer('order')->default(0)->comment("排序");
			$table->boolean('status')->default(0)->comment("状态，0：正常，1：锁定");
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
