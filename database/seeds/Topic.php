<?php

use Illuminate\Database\Seeder;

class Topic extends Seeder
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
        'key' => 'title',
        'title' => '话题标题',
        'type' => 'text',
        'f_module' => 'topic',
        'f_options' => null,
        'f_groups' => '字段分组',
        'f_description' => '话题标题',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'content',
        'title' => '话题内容',
        'type' => 'textarea',
        'f_module' => 'topic',
        'f_options' => null,
        'f_groups' => '字段分组',
        'f_description' => '话题内容',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'select',
        'f_module' => 'topic',
        'f_options' => '[{"title":"正常","value":0},{"title":"锁定","value":1}]',
        'f_groups' => '字段分组',
        'f_description' => '状态，0：正常，1：锁定',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
    }
}