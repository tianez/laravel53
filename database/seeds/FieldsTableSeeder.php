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
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'title',
        'title' => '字段名称',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段名称',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'type',
        'title' => '字段形式',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段形式',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_module',
        'title' => '所属模块',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '所属模块',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_groups',
        'title' => '字段分组',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段分组',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_description',
        'title' => '字段描述',
        'type' => 'textarea',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段描述',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_options',
        'title' => '字段设置',
        'type' => 'textarea',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '字段设置',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_default',
        'title' => '默认值',
        'type' => 'textarea',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '默认值',
        'f_options' => '',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_edit',
        'title' => '编辑权限',
        'type' => 'radio',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '编辑权限',
        'f_options' => '[{"title":"正常","value":0},{"title":"锁定","value":1}]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'order',
        'title' => '排序',
        'type' => 'text',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_options' => '',
        'f_description' => '排序',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'select',
        'f_module' => 'fields',
        'f_options' => '[{"title":"正常","value":0},{"title":"锁定","value":1}]',
        'f_groups' => '字段分组',
        'f_description' => '状态，0：正常，1：锁定',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
        DB::table('fields')->insert([
        array(
        'key' => 'f_add',
        'title' => '新增权限',
        'type' => 'radio',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '新增权限',
        'f_options' =>null,
        'f_ext' => 'roles',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'f_visible',
        'title' => '可见权限',
        'type' => 'checkbox',
        'f_module' => 'fields',
        'f_groups' => '字段分组',
        'f_description' => '可见权限',
        'f_options' => null,
        'f_ext' => 'roles',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
        
        /**
        * 权限管理字段导入
        */
        DB::table('fields')->insert([
        array(
        'key' => 'name',
        'title' => '权限key',
        'type' => 'select',
        'f_module' => 'role_permissions',
        'f_groups' => '字段分组',
        'f_description' => '权限key',
        'f_ext' => 'permts',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'display_name',
        'title' => '权限名称',
        'type' => 'text',
        'f_module' => 'role_permissions',
        'f_groups' => '字段分组',
        'f_description' => '权限名称',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'group',
        'title' => '权限分组',
        'type' => 'text',
        'f_module' => 'role_permissions',
        'f_groups' => '字段分组',
        'f_description' => '权限分组',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'description',
        'title' => '权限描述',
        'type' => 'text',
        'f_module' => 'role_permissions',
        'f_groups' => '字段分组',
        'f_description' => '权限描述',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
    }
}