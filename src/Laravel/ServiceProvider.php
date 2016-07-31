<?php

namespace Topix\Hackademy\LoggableModels\Laravel;

use Illuminate\Database\Eloquent\Relations\Relation;
use Topix\Hackademy\LoggableModels\ModelLogHandler;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = realpath(__DIR__ . '/../config/loggableModels.php');

        $this->publishes([$configPath => $this->getConfigPath()], 'config');

        $this->publishes([ realpath( __DIR__ . '/../database/migrations/' ) => database_path('migrations')], 'migrations');

        // Define Custom Polymorphic Types
        Relation::morphMap([

        ]);

        $this->mergeConfigFrom($configPath, 'loggableModels');

        $this->app->bind('loggable-models', function () {
            return new ModelLogHandler();
        });

    }

    protected function getConfigPath()
    {
        return config_path('loggableModels.php');
    }
}
