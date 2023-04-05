<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
//        $this->app->bind('path.public', function () {
//            return realpath(base_path() . '/../public_html');
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::directive("fileRoute", function () {
            return "/assets/images/";
        });
        Blade::directive("w", function ($w) {
            return "width='" . $w . "px'";
        });
        Blade::directive("h", function ($h) {
            return "height='" . $h . "px'";
        });
        Blade::directive("sliderpath", function ($img) {
            return "/Public/images/{$img}";
        });
        Blade::directive("printStatus", function ($status) {
            if ($status == 1) {
                return "color: green";
            } else {
                return "color: red";
            }
        });
    }
}
