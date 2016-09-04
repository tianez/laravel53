<?php

use Illuminate\Database\Seeder;

class article_category extends Seeder
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
        'key' => 'category_name',
        'title' => '分类名称',
        'type' => 'text',
        'f_module' => 'article_category',
        'f_groups' => '字段分组',
        'f_description' => '分类名称',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'category_ico',
        'title' => '分类图标',
        'type' => 'text',
        'f_module' => 'article_category',
        'f_groups' => '字段分组',
        'f_description' => '分类图标',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'category_des',
        'title' => '分类描述',
        'type' => 'textarea',
        'f_module' => 'article_category',
        'f_groups' => '字段分组',
        'f_description' => '分类描述',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'pid',
        'title' => '上级分类',
        'type' => 'select',
        'f_module' => 'article_category',
        'f_groups' => '字段分组',
        'f_description' => '上级分类',
        'f_options' => null,
        'f_ext' => 'category',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'taxonomy',
        'title' => '所属分类法',
        'type' => 'select',
        'f_module' => 'article_category',
        'f_groups' => '字段分组',
        'f_description' => '所属分类法',
        'f_options' => '[{"title":"栏目分类","value":"category"},{"title":"标签tags","value":"tags"}]',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'select',
        'f_module' => 'article_category',
        'f_groups' => '字段分组',
        'f_description' => '状态',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
        
        DB::table('article_category')->insert([
        array(
        'category_name' => '默认分类',
        'category_des' => '分类名称',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
    }
}