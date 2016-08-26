<?php

use Illuminate\Database\Seeder;

class MeunTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('meun')->insert([
        array(
        'link' => 'api/fields',
        'title' => '字段管理',
        'description' => '字段管理',
        'created_at'=> date("Y-m-d H:i:s")
        ),
        array(
        'link' => 'api/meun',
        'title' => '菜单管理',
        'description' => '菜单管理',
        'created_at'=> date("Y-m-d H:i:s")
        )
        ]);
    }
}