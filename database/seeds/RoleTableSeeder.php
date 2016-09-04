<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
        'key' => 'name',
        'title' => '用户组名',
        'type' => 'text',
        'f_module' => 'roles',
        'f_groups' => '字段分组',
        'f_description' => '用户组名',
        'f_options' =>null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'display_name',
        'title' => '显示名称',
        'type' => 'text',
        'f_module' => 'roles',
        'f_groups' => '字段分组',
        'f_description' => '显示名称',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'thumb',
        'title' => '用户组头像',
        'type' => 'text',
        'f_module' => 'roles',
        'f_groups' => '字段分组',
        'f_description' => '用户组头像',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'description',
        'title' => '用户组描述',
        'type' => 'text',
        'f_module' => 'roles',
        'f_groups' => '字段分组',
        'f_description' => '用户组描述',
        'f_options' => null,
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'key' => 'status',
        'title' => '状态',
        'type' => 'select',
        'f_module' => 'roles',
        'f_groups' => '字段分组',
        'f_description' => '状态，0：正常，1：锁定',
        'f_options' => '[{"title":"正常","value":0},{"title":"锁定","value":1}]',
        'f_ext' => null,
        'created_at'=> date("Y-m-d H:i:s")
        ),
        ]);
        /** 
        * 用户组
        */
        DB::table('roles')->insert([
        array(
        'name' => 'admin',
        'display_name' => '管理员',
        'thumb' => '',
        'description' => '系统管理员',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'name' => 'reader',
        'display_name' => '读者',
        'thumb' => '',
        'description' => '普通读者用户',
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);

        /**
        * 为初始用户关联用户组
        */
        DB::table('role_user')->insert([
        array(
        'user_id' => '1',
        'role_id' => '1'
        )
        ]);
    }
}