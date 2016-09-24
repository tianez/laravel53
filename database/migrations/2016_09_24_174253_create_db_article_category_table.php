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
			$table->increments('id')->comment("主键ID");
			$table->string('category_name')->comment("分类名称");
			$table->string('category_ico')->nullable()->comment("分类图标");
			$table->text('category_des')->nullable()->comment("分类描述");
			$table->integer('pid')->default(0)->comment("上级分类");
			$table->string('taxonomy')->default('category')->comment("所属分类法");
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
		Schema::drop('db_article_category');
	}

}
