<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 1,
                'user_name' => 'tianez',
                'email' => 'saber_tz@163.com',
                'password' => '$2y$10$jDzWc6KbXwQ3xwAZFz8K9.teUuOtKvyygLLSLOFluzwWQof66YhZa',
                'real_name' => 'tianez',
                'china_id' => '',
                'head_img' => '',
                'office_phone' => '',
                'mobile_phone' => '',
                'qq' => '',
                'sex' => 1,
                'score' => 0,
                'job' => '',
                'team' => NULL,
                'company_id' => 0,
                'remarks' => '',
                'status' => 0,
                'login_totals' => 0,
                'reg_ip' => '0.0.0.0',
                'last_login_ip' => '0.0.0.0',
                'uid' => 0,
                'remember_token' => NULL,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role' => 1,
                'user_name' => 'tianez2',
                'email' => 'saber_tz2@163.com',
                'password' => '$2y$10$U3DrLQ2WmOBZ3uIyAj90E.fSPRKJ68VBQv4heNvUo3iB.29kUWMTO',
                'real_name' => 'tianez2',
                'china_id' => '',
                'head_img' => '',
                'office_phone' => '',
                'mobile_phone' => '',
                'qq' => '',
                'sex' => 1,
                'score' => 0,
                'job' => '',
                'team' => NULL,
                'company_id' => 0,
                'remarks' => '',
                'status' => 0,
                'login_totals' => 0,
                'reg_ip' => '0.0.0.0',
                'last_login_ip' => '0.0.0.0',
                'uid' => 0,
                'remember_token' => NULL,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
