<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider
{
    // 敏感过滤词
    public $string = array('坏人');
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        Validator::extend('foo', function($attribute, $value, $parameters) {
            $string = $this->string;
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
        //
    }
}