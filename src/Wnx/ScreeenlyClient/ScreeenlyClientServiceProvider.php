<?php namespace Wnx\ScreeenlyClient;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Wnx\ScreeenlyClient\Screenshot;

class ScreeenlyClientServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
    public function register()
    {
        $this->app->bind('Screenshot', function ($app) {

            $key = config('screeenly_client.secret');

            return new Screenshot($key);
        });
    }

    /**
     * Publish the plugin configuration.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/screeenly_client.php' => config_path('screeenly_client.php')
        ]);

        AliasLoader::getInstance()->alias(
            'Screenshot',
            'Wnx\ScreeenlyClient\Facades\Screenshot'
        );
    }

}
