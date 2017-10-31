<?php

namespace Robots;

use Illuminate\Support\ServiceProvider;

class RobotsTxtProvider extends ServiceProvider
{
    public function boot()
    {
        // Config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('robots_txt.php'),
        ], 'config');

        app(RobotsTxt::class)->init();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'robots_txt');
    }
}
