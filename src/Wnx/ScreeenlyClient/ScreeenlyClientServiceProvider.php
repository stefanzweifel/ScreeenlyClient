<?php namespace Wnx\ScreeenlyClient;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Wnx\ScreeenlyClient\Screenshot;

class ScreeenlyClientServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->package('wnx/screeenly-client');

		$this->app->bind('Screenshot', function($app) {

            $key = $this->app['config']->get('screeenly-client::secret');

            return new Screenshot($key);
        });
	}

	public function boot()
	{
		$this->package('wnx/screeenly-client');

        AliasLoader::getInstance()->alias(
            'Screenshot',
            'Wnx\ScreeenlyClient\Facades\Screenshot'
        );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
