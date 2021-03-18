<?php

namespace Cms\Cmsblog;

use Illuminate\Support\ServiceProvider;

class CmsblogServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../src/config/config.php', 'cmsblog');
    }

    public function boot()
    {
        // dd(__DIR__);
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'cmsblog');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // $this->publishes([
        //     __DIR__.'/public' => public_path('contents/admin'),
        // ], 'public');
        // _DIR_ . '/../public/images' => public_path('package_images'),


        $this->publishes([
            __DIR__ . '/../src/assets' => public_path('package_assets'),
        ], 'assets');


        // $this->publishes([
        //     __DIR__ . '/config/app.php' => public_path('app.php'),
        // ]);

        // Config
        $this->publishes([
            __DIR__ . '/../src/config/config.php' => config_path('blogpackageconfig.php')
        ], 'config');
    }
}
