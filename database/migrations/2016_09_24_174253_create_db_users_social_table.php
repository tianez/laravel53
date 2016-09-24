<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbUsersSocialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_users_social', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid')->comment("本地账号id");
			$table->string('openid')->comment("第三方openid");
			$table->string('nickname')->comment("昵称");
			$table->boolean('sex')->default(1)->comment("性别，0：男，1：女");
			$table->string('city')->comment("所在城市");
			$table->string('province')->comment("所在省份");
			$table->string('country')->comment("国家");
			$table->string('headimgurl')->comment("头像");
			$table->string('subscribe_time')->comment("关注时间");
			$table->string('plat')->comment("所属第三方平台");
			$table->boolean('status')->default(1)->comment("状态,1:已关注,0:已取消关注");
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
		Schema::drop('db_users_social');
	}

}
