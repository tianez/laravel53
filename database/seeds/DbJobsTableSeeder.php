<?php

use Illuminate\Database\Seeder;

class DbJobsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('db_jobs')->delete();
        
        
        
    }
}
