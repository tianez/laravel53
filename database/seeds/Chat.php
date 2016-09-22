<?php

use Illuminate\Database\Seeder;

class Chat extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        /**
        * 字段导入
        */
        DB::table('fields')->insert([
        array(
        'key' => 'content',
        'title' => '评论内容',
        'type' => 'textarea',
        'f_module' => 'chat',
        'f_groups' => '字段分组',
        'f_description' => '评论内容',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'username',
        'title' => '用户名',
        'type' => 'text',
        'f_module' => 'chat',
        'f_groups' => '字段分组',
        'f_description' => '用户名',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'user_id',
        'title' => '用户ID',
        'type' => 'text',
        'f_module' => 'chat',
        'f_groups' => '字段分组',
        'f_description' => '用户ID',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'head_img',
        'title' => '用户头像',
        'type' => 'text',
        'f_module' => 'chat',
        'f_groups' => '字段分组',
        'f_description' => '用户头像',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'time',
        'title' => '发布时间',
        'type' => 'text',
        'f_module' => 'chat',
        'f_groups' => '字段分组',
        'f_description' => '发布时间',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);
    }
}