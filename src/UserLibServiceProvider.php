<?php

namespace MaabJavaid\UserLib;

use Illuminate\Support\ServiceProvider;
use MaabJavaid\UserLib\Facades\ReqresClient;

class UserLibServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/user-lib.php', 'user-lib');

        // Register the service the package provides.
        $this->app->singleton('user-lib', function ($app) {
            return new UserLib;
        });

        $this->app->singleton('reqresClient', fn() => new ReqresClient());
    }

    public function provides()
    {
        return ['user-lib'];
    }

    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/user-lib.php' => config_path('user-lib.php'),
        ], 'user-lib.config');
    }

    private function apiRoutesConfigurations(): array
    {
        return [
            'prefix'     => config('user-lib.api_routes.prefix'),
            'namespace'  => config('user-lib.api_routes.namespace')
        ];
    }
}
