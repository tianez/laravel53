<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeunTable extends Migration
{
    /**
    * 菜单管理
    * meun:菜单表
    */
    public function up()
    {
        Schema::dropIfExists('meun');
        Schema::create('meun', function(Blueprint $table) {
            $table -> increments('id');
            $table -> string('link') -> unique() -> comment('菜单地址');
            $table -> string('title') -> unique() -> comment('菜单标题');
            $table -> string('icon') -> nullable() -> comment('菜单图标');
            $table -> text('description') -> nullable() -> comment('菜单描述');
            $table -> string('roles') -> default('[1]') -> comment('拥有权限的用户组');
            $table -> integer('order') -> default(0) -> comment('排序');
            $table -> tinyInteger('status') -> default(0) -> comment('状态，0：正常，1：锁定');
            $table -> timestamps();
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        //
    }
}