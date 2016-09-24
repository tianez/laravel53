<?php

use Illuminate\Database\Seeder;

class meunTableSeeder extends Seeder
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
        'key' => 'link',
        'title' => '菜单地址',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单地址',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'title',
        'title' => '菜单标题',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单标题',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'icon',
        'title' => '菜单图标',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单图标',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'description',
        'title' => '菜单描述',
        'type' => 'textarea',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '菜单描述',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'roles',
        'title' => '用户组',
        'type' => 'checkbox',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '拥有权限的用户组',
        'f_ext' => 'roles',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'order',
        'title' => '排序',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '排序',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'text',
        'f_module' => 'meun',
        'f_groups' => '字段分组',
        'f_description' => '状态',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);
        
        /**
        * 菜单信息导入
        */
        DB::table('meun')->insert([
        array(
        'link' => 'index',
        'title' => '首页',
        'icon' => 'fa fa-home',
        'description' => '首页',
        'roles' => '[1,2]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'import',
        'title' => '体检数据导入',
        'icon' => 'fa fa-heartbeat',
        'description' => '体检数据导入',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/article',
        'title' => '文章管理',
        'icon' => 'fa fa-user',
        'description' => '文章管理',
        'roles' => '[1,2]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/article_category',
        'title' => '分类管理',
        'icon' => 'fa fa-user',
        'description' => '分类管理',
        'roles' => '[1,2]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/topic',
        'title' => '直播话题',
        'icon' => 'fa fa-th-list',
        'description' => '直播话题',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/chats',
        'title' => '直播评论',
        'icon' => 'fa fa-th-list',
        'description' => '直播评论',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/fields',
        'title' => '字段管理',
        'icon' => 'fa fa-file-text-o',
        'description' => '字段管理',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/meun',
        'title' => '菜单管理',
        'icon' => 'fa fa-th-list',
        'description' => '菜单管理',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/permissions',
        'title' => '权限管理',
        'icon' => 'fa fa-unlock-alt',
        'description' => '权限管理',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/roles',
        'title' => '用户组管理',
        'icon' => 'fa fa-users',
        'description' => '用户组管理',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/users',
        'title' => '用户管理',
        'icon' => 'fa fa-user',
        'description' => '用户管理',
        'roles' => '[1]',
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);
    }
}