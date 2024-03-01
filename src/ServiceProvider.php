<?php namespace HomedoctorEs\OpentokLaravel;

use HomedoctorEs\OpentokLaravel\Services\OpenTok;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * {@inheritDoc}
     */
    public function provides(): array
    {
        return [
            'opentok',
            Opentok::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'opentok');
    }

    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('opentok.php')], 'config');

        $this->app->singleton('OpentokApi', function ($app) {
            return $this->getOpenTokClient($app['config']);
        });
    }

    private function getOpenTokClient($config): OpenTok
    {
        $config = $config->get('opentok');
        return OpenTok::make($config['api_key'], $config['api_secret']);
    }

    private function configPath(): string
    {
        return __DIR__ . '/../config/opentok.php';
    }

}
