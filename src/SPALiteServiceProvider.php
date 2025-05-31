// Code par NetNPB.com 
<?php

namespace YourVendor\SPALite;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SPALiteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'spa-lite');

        $this->publishes([
            __DIR__.'/../public/spa-lite.js' => public_path('js/spa-lite.js'),
            __DIR__.'/../resources/views/layout.blade.php' => resource_path('views/layouts/spa.blade.php'),
        ], 'spa-lite-assets');

        $this->loadRoutesFrom(__DIR__.'/../routes/spa.php');
    }
}