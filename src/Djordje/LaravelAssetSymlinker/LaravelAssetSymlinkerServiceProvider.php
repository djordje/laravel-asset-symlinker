<?php namespace Djordje\LaravelAssetSymlinker;

use Djordje\LaravelAssetSymlinker\Console\AssetSymlinkCommand;
use Djordje\LaravelAssetSymlinker\Asset\AssetSymlinker;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Filesystem\Filesystem;

class LaravelAssetSymlinkerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('djordje/laravel-asset-symlinker');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerAssetSymlinker();

		$this->commands('command.asset.symlink');
	}

	protected function registerAssetSymlinker()
	{
		$this->registerAssetSymlinkCommand();

		$this->app['asset.symlinker'] = $this->app->share(function($app)
		{
			$publicPath = $app['path.public'];
			$symlinker = new AssetSymlinker(new Filesystem, $publicPath);

			$symlinker->setPackagePath($app['path.base'].'/vendor');
			return $symlinker;
		});
	}

	protected function registerAssetSymlinkCommand()
	{
		$this->app['command.asset.symlink'] = $this->app->share(function($app)
		{
			return new AssetSymlinkCommand($app['asset.symlinker']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'asset.publisher',
			'command.asset.publish'
		);
	}

}