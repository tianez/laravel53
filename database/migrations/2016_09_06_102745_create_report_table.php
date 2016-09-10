<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::dropIfExists('report');
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('username') -> comment('用户名');
            $table -> string('sex') -> nullable() ->  comment('性别');
            $table -> string('mingzu') -> nullable() ->  comment('名族');
            $table -> string('danwei') -> nullable() ->  comment('单位及职务');
            $table -> string('phone') -> nullable() ->comment('手机号码');
            $table -> string('fangjian') -> nullable() ->  comment('房间号'); 
            $table -> string('jdr') -> nullable() ->  comment('接待人'); 
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
        Schema::drop('report');
    }
}