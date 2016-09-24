<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTjTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::dropIfExists('tj_member');
        Schema::create('tj_member', function(Blueprint $table) {
            $table -> increments('id');
            $table -> bigInteger('tj_id') -> unique() -> comment('体检单号');
            $table -> string('tj_name') -> comment('体检用户名');
            $table -> string('password') -> comment('查询密码');
            $table->dateTime('c_time') -> comment('体检时间');
            $table->dateTime('a_time') -> nullable() ->  comment('报告时间');
            $table -> timestamps();
        });
        Schema::dropIfExists('tj_result');
        Schema::create('tj_result', function(Blueprint $table) {
            $table -> increments('id');
            $table -> bigInteger('tj_id') -> comment('体检单号');
            $table -> string('item') -> comment('体检项目');
            $table -> string('result') -> comment('项目结果');
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