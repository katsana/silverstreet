<?php

namespace Silverstreet\Laravel;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Laravie\Codex\Discovery;
use Silverstreet\Client;

class SilverstreetServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('silverstreet', function (Container $app) {
            return $this->createSilverstreetClient(
                $app->make('config')->get('services.silverstreet')
            );
        });
    }

    /**
     * Create Silverstreet Client.
     *
     * @param array $config
     *
     * @return \Silverstreet\Client
     */
    protected function createSilverstreetClient(array $config): Client
    {
        return new Client(
            $this->createHttpClient(), $config['username'], $config['password']
        );
    }

    /**
     * Create HTTP Client.
     *
     * @return \Http\Client\Common\HttpMethodsClient
     */
    protected function createHttpClient()
    {
        return Discovery::client();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['silverstreet'];
    }
}
