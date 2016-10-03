<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('db_roles')->delete();
        
        \DB::table('db_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => '管理员',
                'thumb' => '',
                'description' => '系统管理员',
                'status' => 0,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'editor',
                'display_name' => '编辑',
                'thumb' => '',
                'description' => '编辑',
                'status' => 0,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'reader',
                'display_name' => '读者',
                'thumb' => '',
                'description' => '普通用户',
                'status' => 0,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
