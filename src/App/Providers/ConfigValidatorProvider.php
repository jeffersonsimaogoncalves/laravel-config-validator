<?php

namespace AshAllenDesign\ConfigValidator\App\Providers;

use AshAllenDesign\ConfigValidator\App\Console\Commands\ValidateConfigCommand;
use AshAllenDesign\ConfigValidator\App\Services\ConfigValidator;
use Illuminate\Support\ServiceProvider;

class ConfigValidatorProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->alias(ConfigValidator::class, 'config-validator');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ValidateConfigCommand::class,
            ]);
        }
    }
}
