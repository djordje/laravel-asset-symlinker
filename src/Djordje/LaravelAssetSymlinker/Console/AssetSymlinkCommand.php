<?php namespace Djordje\LaravelAssetSymlinker\Console;

use Illuminate\Foundation\Console\AssetPublishCommand;
use Djordje\LaravelAssetSymlinker\Asset\AssetSymlinker;

class AssetSymlinkCommand extends AssetPublishCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'asset:symlink';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Symlink a package's assets to the public directory";

	/**
	 * The asset symlinker instance.
	 *
	 * @var \Djordje\LaravelAssetSymlinker\Asset\AssetSymlinker
	 */
	protected $assets;

	/**
	 * Create a new asset symlink command instance.
	 *
	 * @param AssetSymlinker $assets
	 */
	public function __construct(AssetSymlinker $assets)
	{
		parent::__construct($assets);
	}

}