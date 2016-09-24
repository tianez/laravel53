<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        date_default_timezone_set("Asia/Shanghai");
        $this->call(meunTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(Role_permissions::class);
        $this->call(article::class);
        $this->call(article_category::class);
        $this->call(Chat::class);
        $this->call(Topic::class);
        
    }
}