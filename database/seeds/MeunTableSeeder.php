<?php

use Illuminate\Database\Seeder;

class MeunTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meun')->delete();
        
        \DB::table('meun')->insert(array (
            0 => 
            array (
                'id' => 1,
                'link' => 'index',
                'title' => '首页',
                'icon' => 'fa fa-home',
                'description' => '首页',
                'roles' => '[1,2]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'link' => 'import',
                'title' => '体检数据导入',
                'icon' => 'fa fa-heartbeat',
                'description' => '体检数据导入',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'link' => 'api/article',
                'title' => '文章管理',
                'icon' => 'fa fa-user',
                'description' => '文章管理',
                'roles' => '[1,2]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'link' => 'api/article_category',
                'title' => '分类管理',
                'icon' => 'fa fa-user',
                'description' => '分类管理',
                'roles' => '[1,2]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'link' => 'api/topic',
                'title' => '直播话题',
                'icon' => 'fa fa-th-list',
                'description' => '直播话题',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'link' => 'api/chats',
                'title' => '直播评论',
                'icon' => 'fa fa-th-list',
                'description' => '直播评论',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'link' => 'api/fields',
                'title' => '字段管理',
                'icon' => 'fa fa-file-text-o',
                'description' => '字段管理',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'link' => 'api/meun',
                'title' => '菜单管理',
                'icon' => 'fa fa-th-list',
                'description' => '菜单管理',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'link' => 'api/permissions',
                'title' => '权限管理',
                'icon' => 'fa fa-unlock-alt',
                'description' => '权限管理',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'link' => 'api/roles',
                'title' => '用户组管理',
                'icon' => 'fa fa-users',
                'description' => '用户组管理',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'link' => 'api/users',
                'title' => '用户管理',
                'icon' => 'fa fa-user',
                'description' => '用户管理',
                'roles' => '[1]',
                'order' => 0,
                'status' => 0,
                'created_at' => '2016-09-24 12:20:52',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
