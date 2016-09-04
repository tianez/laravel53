<?php

use Illuminate\Database\Seeder;

class article extends Seeder
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
        'title' => '标题',
        'type' => 'text',
        'f_module' => 'article',
        'f_groups' => '字段分组',
        'f_description' => '标题',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'keyword',
        'title' => '关键词',
        'type' => 'text',
        'f_module' => 'article',
        'f_groups' => '字段分组',
        'f_description' => '关键词',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'category',
        'title' => '文章分类',
        'type' => 'select',
        'f_module' => 'article',
        'f_groups' => '字段分组',
        'f_description' => '文章分类',
        'f_ext' => 'category',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'excerpt',
        'title' => '简介',
        'type' => 'textarea',
        'f_module' => 'article',
        'f_groups' => '字段分组',
        'f_description' => '简介',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'thumb',
        'title' => '缩略图',
        'type' => 'upload',
        'f_module' => 'article',
        'f_groups' => '字段分组',
        'f_description' => '缩略图',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'content',
        'title' => '内容',
        'type' => 'editer',
        'f_module' => 'article',
        'f_groups' => '字段分组',
        'f_description' => '内容',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
    }
}