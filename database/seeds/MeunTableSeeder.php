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
        DB::table('meun')->insert([
        array(
        'link' => 'index',
        'title' => '首页',
        'icon' => 'fa fa-home',
        'description' => '首页',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'import',
        'title' => '体检数据导入',
        'icon' => 'fa fa-heartbeat',
        'description' => '体检数据导入',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/fields',
        'title' => '字段管理',
        'icon' => 'fa fa-file-text-o',
        'description' => '字段管理',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/meun',
        'title' => '菜单管理',
        'icon' => 'fa fa-th-list',
        'description' => '菜单管理',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/roles',
        'title' => '用户组管理',
        'icon' => 'fa fa-user',
        'description' => '用户组管理',
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);
    }
}
