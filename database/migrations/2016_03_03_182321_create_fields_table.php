<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        // if (Schema::hasTable('fields')) {
        //     Schema::drop('fields');
        // }
        Schema::dropIfExists('fields');
        Schema::create('fields', function(Blueprint $table) {
            $table -> increments('id');
            // $table -> string('key') -> unique() -> comment('字段key');
            $table -> string('key') -> comment('字段key');
            $table -> string('title') -> comment('字段名称');
            $table -> string('type') -> comment('字段形式');
            $table -> string('f_module') -> nullable() -> comment('所属模块');
            $table -> string('f_groups') -> nullable() -> comment('字段分组');
            $table -> text('f_description') -> nullable() -> comment('字段描述');
            $table -> text('f_options') -> nullable() -> comment('字段设置');
            $table -> string('f_ext') -> nullable() -> comment('字段扩展');
            $table -> string('f_default') -> nullable() -> comment('默认值');
            $table -> string('f_add') -> default('[1]') -> comment('新增权限');
            $table -> string('f_edit') -> default('[1]') -> comment('编辑权限');
            $table -> string('f_visible') -> default('[1]') -> comment('可见权限');
            $table -> integer('order') -> default(0) -> comment('排序');
            $table -> tinyInteger('status') -> default(0) -> comment('状态，0：正常，1：锁定');
            $table -> timestamps();
            $table -> softDeletes();
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('fields');
    }
}