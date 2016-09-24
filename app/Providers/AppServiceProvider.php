<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;
use Storage;

class AppServiceProvider extends ServiceProvider
{
    
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    
    // 敏感过滤词
    public function boot()
    {
        Validator::extend('foo', function($attribute, $value, $parameters) {
            $contents = Storage::disk('lang')->get('word/word.txt');
            $string = explode("\r\n",$contents);
            $value = str_replace(' ', '', $value);
            foreach ($string as $key => $str) {
                if(strpos($value,$str)>-1){
                    return false;
                }
            }
            return true;
        });
    }
    
    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Iber\Generator\ModelGeneratorProvider');
            // $this->app->register('JoshTaylor\MigrationsGenerator\MigrationsGeneratorServiceProvider');
        }
    }
}