<?php

use Illuminate\Database\Seeder;

class DbConfigTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('db_config')->delete();
        
        \DB::table('db_config')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'chat_view',
                'value' => '100',
                'description' => '直播页面浏览次数',
                'created_at' => '2016-10-04 18:48:40',
                'updated_at' => '2016-10-04 18:48:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'chat_number',
                'value' => '100',
                'description' => '直播页面当前人数加成',
                'created_at' => '2016-10-04 18:50:28',
                'updated_at' => '2016-10-04 18:50:28',
            ),
        ));
        
        
    }
}
