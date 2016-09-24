<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'App\\Http\\Controllers\\AdminController@getIndex',
                'display_name' => '后台首页',
                'group' => '默认',
                'description' => '后台首页权限',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'App\\Http\\Controllers\\ArticleController@getIndex',
                'display_name' => '文章列表',
                'group' => '文章管理',
                'description' => '文章列表',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'App\\Http\\Controllers\\ArticleController@getAdd',
                'display_name' => '新增文章',
                'group' => '文章管理',
                'description' => '新增文章',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'App\\Http\\Controllers\\ArticleController@getDetail',
                'display_name' => '查看文章',
                'group' => '文章管理',
                'description' => '查看文章',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'App\\Http\\Controllers\\ArticleController@postDetail',
                'display_name' => '编辑文章',
                'group' => '文章管理',
                'description' => '编辑文章',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'App\\Http\\Controllers\\ArticleController@getDelete',
                'display_name' => '删除文章',
                'group' => '文章管理',
                'description' => '删除文章',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'App\\Http\\Controllers\\CategoryController@getIndex',
                'display_name' => '分类列表',
                'group' => '分类管理',
                'description' => '分类列表',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'App\\Http\\Controllers\\CategoryController@getAdd',
                'display_name' => '新增分类',
                'group' => '分类管理',
                'description' => '新增分类',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'App\\Http\\Controllers\\CategoryController@getDetail',
                'display_name' => '查看分类',
                'group' => '分类管理',
                'description' => '查看分类',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'App\\Http\\Controllers\\CategoryController@postDetail',
                'display_name' => '编辑分类',
                'group' => '分类管理',
                'description' => '编辑分类',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'App\\Http\\Controllers\\CategoryController@getDelete',
                'display_name' => '删除分类',
                'group' => '分类管理',
                'description' => '删除分类',
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
