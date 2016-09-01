# laravel53
laravel53

php artisan make:migration create_users_table

php artisan make:seeder role_permissionsTableSeeder
php artisan migrate
php artisan migrate:refresh --seed


php artisan db:seed --class=UserTableSeeder