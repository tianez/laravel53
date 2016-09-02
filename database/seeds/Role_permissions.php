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
        DB::table('role_permissions')->insert([
        array(
        'name' => 'App\Http\Controllers\AdminController@getIndex',
        'display_name' => '后台首页',
        'group' => '默认',
        'description' => '后台首页权限',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'App\Http\Controllers\AdminController@getList',
        'display_name' => '列表页',
        'group' => '默认',
        'description' => '列表页权限',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
    }
}