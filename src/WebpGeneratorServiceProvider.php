<?php

namespace yanaberkarya\webpgenerator;
use Illuminate\Support\ServiceProvider;

class WebpGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/webp-generator.php' => config_path('webp-generator.php'),
        ], 'config');
    }
    public function register()
    {
        $this->app->bind('webp', function () {
            return new WebpGenerator();
        });
    }
}
