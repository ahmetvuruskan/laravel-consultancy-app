<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive("fileRoute",function (){
            return "/assets/images/";
        });
        Blade::directive("w",function ($w){
            return "width='".$w."px'";
        });
        Blade::directive("h",function ($h){
            return "height='".$h."px'";
        });
        Blade::directive("sliderpath",function ($img){
            return "/Public/images/{$img}";
        });


    }
}
