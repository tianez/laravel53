<?php

use Illuminate\Database\Seeder;

class ArticleCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('db_article_category')->delete();
        
        \DB::table('db_article_category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_name' => '默认分类',
                'category_ico' => NULL,
                'category_des' => '分类名称',
                'pid' => 0,
                'taxonomy' => 'category',
                'status' => 0,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_name' => '默认tags',
                'category_ico' => NULL,
                'category_des' => '分类名称',
                'pid' => 0,
                'taxonomy' => 'tags',
                'status' => 0,
                'created_at' => '2016-09-24 12:20:53',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
