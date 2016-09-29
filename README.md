# laravel53
laravel53

composer dump-autoload

php artisan make:migration create_users_table

php artisan make:seeder article_category
php artisan migrate
php artisan migrate:refresh --seed


php artisan db:seed --class=UserTableSeeder
 

php artisan make:controller PhotoController --resource

php artisan make:model User

php artisan make:model User -m

/**
 * 从数据库导出模型
 * https://github.com/ignasbernotas/laravel-model-generator
 * php artisan make:models
**/
 
/**
 * 从数据库导出数据
 * https://github.com/orangehill/iseed
 * php artisan iseed my_table
**/

/**
 * 从数据库导出数据库结构
 * php artisan migrate:generate 
**/