<?php
namespace Netinternet\Ilkbyte;

use Illuminate\Support\ServiceProvider;

class IlkbyteServiceProvider extends ServiceProvider
{
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ilkbyte'];
    }

    public function boot()
    {
        $this->handleConfiguration();
    }

    public function handleConfiguration()
    {
        $configPath = __DIR__.'/../config/ilkbyte.php';

        $this->publishes([$configPath => config_path('ilkbyte.php')], 'Ilkbyte');
        // Merge config files...
        $this->mergeConfigFrom($configPath, 'ilkbyte');
    }
    /**
     * Register the package services.
     *
     * @return void
     */
    protected function registerServices()
    {
        $this->app->singleton('ilkbyte', function ($app) {
            return new Ilkbyte();
        });
    }
}