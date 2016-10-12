<?php

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('db_role_permission')->delete();
        
        \DB::table('db_role_permission')->insert(array (
            0 => 
            array (
                'role_id' => 2,
                'permission_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'permission_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 2,
                'permission_id' => 3,
            ),
            3 => 
            array (
                'role_id' => 2,
                'permission_id' => 4,
            ),
            4 => 
            array (
                'role_id' => 3,
                'permission_id' => 4,
            ),
            5 => 
            array (
                'role_id' => 2,
                'permission_id' => 5,
            ),
            6 => 
            array (
                'role_id' => 2,
                'permission_id' => 6,
            ),
            7 => 
            array (
                'role_id' => 2,
                'permission_id' => 7,
            ),
            8 => 
            array (
                'role_id' => 2,
                'permission_id' => 8,
            ),
            9 => 
            array (
                'role_id' => 2,
                'permission_id' => 9,
            ),
            10 => 
            array (
                'role_id' => 2,
                'permission_id' => 10,
            ),
            11 => 
            array (
                'role_id' => 2,
                'permission_id' => 11,
            ),
        ));
        
        
    }
}
