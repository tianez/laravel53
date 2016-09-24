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
        $this->call('FieldsTableSeeder');
        $this->call('MeunTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('RolePermissionTableSeeder');
        $this->call('ArticleCategoryTableSeeder');
    }
}