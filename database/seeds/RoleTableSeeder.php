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