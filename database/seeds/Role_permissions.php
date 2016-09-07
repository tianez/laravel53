<?php

use Illuminate\Database\Seeder;

class Role_permissions extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
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
        'key' => 'roles',
        'title' => '用户组',
        'type' => 'checkbox',
        'f_module' => 'role_permissions',
        'f_groups' => '字段分组',
        'f_description' => '用户组',
        'f_ext' => 'roles',
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
        DB::table('role_permissions')->insert([
        array(
        'name' => 'App\Http\Controllers\AdminController@getIndex',
        'display_name' => '后台首页',
        'group' => '默认',
        'description' => '后台首页权限',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'App\Http\Controllers\ArticleController@getIndex',
        'display_name' => '文章列表',
        'group' => '文章管理',
        'description' => '文章列表',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'App\Http\Controllers\ArticleController@getAdd',
        'display_name' => '新增文章',
        'group' => '文章管理',
        'description' => '新增文章',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'App\Http\Controllers\ArticleController@getDetail',
        'display_name' => '查看文章',
        'group' => '文章管理',
        'description' => '查看文章',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'App\Http\Controllers\ArticleController@postDetail',
        'display_name' => '编辑文章',
        'group' => '文章管理',
        'description' => '编辑文章',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'App\Http\Controllers\ArticleController@getDelete',
        'display_name' => '删除文章',
        'group' => '文章管理',
        'description' => '删除文章',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);

        DB::table('role_permission')->insert([
        array(
        'role_id' => '2',
        'permission_id' => '1'
        ),
        array(
        'role_id' => '2',
        'permission_id' => '2'
        ),
        array(
        'role_id' => '2',
        'permission_id' => '3'
        ),
        array(
        'role_id' => '2',
        'permission_id' => '4'
        ),
        array(
        'role_id' => '2',
        'permission_id' => '5'
        ),
        ]);
    }
}