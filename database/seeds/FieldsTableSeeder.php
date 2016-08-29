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

        /**
        * 字段自身字段导入
        */
        DB::table('fields')->insert([
        array(
        'key' => 'key',
        'title' => '字段key',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段key',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'title',
        'title' => '字段名称',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段名称',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'type',
        'title' => '字段形式',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段形式',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_module',
        'title' => '所属模块',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '所属模块',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_groups',
        'title' => '字段分组',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段分组',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_description',
        'title' => '字段描述',
        'type' => 'textarea',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段描述',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_default',
        'title' => '默认值',
        'type' => 'textarea',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '默认值',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_add',
        'title' => '新增权限',
        'type' => 'checkbox',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '新增权限',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_edit',
        'title' => '编辑权限',
        'type' => 'checkbox',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '编辑权限',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_visible',
        'title' => '可见权限',
        'type' => 'checkbox',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '可见权限',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'order',
        'title' => '排序',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '排序',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '状态，0：正常，1：锁定',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
        /**
        * 导航菜单字段导入
        */
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