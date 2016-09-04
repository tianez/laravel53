<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
        'key' => 'user_name',
        'title' => '用户名',
        'type' => 'text',
        'f_module' => 'users',
        'f_groups' => '字段分组',
        'f_description' => '用户名',
        'f_options' =>null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'email',
        'title' => '邮箱',
        'type' => 'text',
        'f_module' => 'users',
        'f_groups' => '字段分组',
        'f_description' => '邮箱',
        'f_options' =>null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'password',
        'title' => '用户密码',
        'type' => 'text',
        'f_module' => 'users',
        'f_groups' => '字段分组',
        'f_description' => '用户密码',
        'f_options' =>null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'groups',
        'title' => '用户组',
        'type' => 'checkbox',
        'f_module' => 'users',
        'f_groups' => '字段分组',
        'f_description' => '用户组',
        'f_options' =>null,
        'f_ext' => 'roles',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'select',
        'f_module' => 'users',
        'f_groups' => '字段分组',
        'f_description' => '状态，0：正常，1：锁定',
        'f_options' => '[{"title":"正常","value":0},{"title":"锁定","value":1}]',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
        DB::table('users')->insert([
        array(
        'user_name' => 'tianez',
        'real_name' => 'tianez',
        'china_id' => '',
        'head_img' => '',
        'office_phone' => '',
        'mobile_phone' => '',
        'qq' => '',
        'job' => '',
        'remarks' => '',
        'email' => 'saber_tz@163.com',
        'password' => bcrypt('123456'),
        'role'=>'1',
        'created_at'=> date("Y-m-d H:i:s"),
        ),
        array(
        'user_name' => 'tianez2',
        'real_name' => 'tianez2',
        'china_id' => '',
        'head_img' => '',
        'office_phone' => '',
        'mobile_phone' => '',
        'qq' => '',
        'job' => '',
        'remarks' => '',
        'email' => 'saber_tz2@163.com',
        'password' => bcrypt('123456'),
        'role'=>'1',
        'created_at'=> date("Y-m-d H:i:s"),
        ),
        ]);
    }
}