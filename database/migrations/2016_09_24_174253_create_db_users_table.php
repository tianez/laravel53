<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('role')->default(0)->comment("用户角色，0：普通用户，1：超级管理员，2：普通管理员");
			$table->string('user_name')->unique('users_user_name_unique')->comment("用户名");
			$table->string('email')->unique('users_email_unique')->comment("邮箱");
			$table->string('password', 60)->comment("用户密码");
			$table->string('real_name')->nullable()->comment("真实姓名");
			$table->string('china_id')->nullable()->comment("身份证号码");
			$table->string('head_img')->nullable()->comment("用户头像");
			$table->string('office_phone')->nullable()->comment("办公号码");
			$table->string('mobile_phone')->nullable()->comment("手机号码");
			$table->string('qq')->nullable()->comment("QQ号码");
			$table->boolean('sex')->default(1)->comment("性别，0：男，1：女");
			$table->integer('score')->default(0)->comment("用户积分");
			$table->string('job')->nullable()->comment("职位职称");
			$table->string('team')->nullable()->comment("部门");
			$table->integer('company_id')->default(0)->comment("单位，0：系统人员");
			$table->string('remarks')->nullable()->comment("备注");
			$table->boolean('status')->default(0)->comment("用户状态,0:正常,1:锁定");
			$table->integer('login_totals')->default(0)->comment("累计登录次数");
			$table->string('reg_ip')->default('0.0.0.0')->comment("注册IP");
			$table->string('last_login_ip')->default('0.0.0.0')->comment("最后登录IP");
			$table->integer('uid')->default(0)->comment("操作人员ID，0：自己注册用户");
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('db_users');
	}

}
