<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('fields')->insert([
        array(
        'key' => 'link',
        'title' => '菜单地址',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单地址',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'title',
        'title' => '菜单标题',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单标题',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'icon',
        'title' => '菜单图标',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单图标',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'description',
        'title' => '菜单描述',
        'type' => 'textarea',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单描述',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'roles',
        'title' => '用户组',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '拥有权限的用户组',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'order',
        'title' => '排序',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '排序',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '状态',
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);
    }
}