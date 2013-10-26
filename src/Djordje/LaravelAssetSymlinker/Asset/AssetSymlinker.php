<?php namespace Djordje\LaravelAssetSymlinker\Asset;

use Illuminate\Foundation\AssetPublisher;
use Symfony\Component\Filesystem\Filesystem;

class AssetSymlinker extends AssetPublisher {

	/**
	 * The filesystem instance.
	 *
	 * @var \Symfony\Component\Filesystem\Filesystem
	 */
	protected $files;

	/**
	 * Create a new asset publisher instance.
	 *
	 * @param Filesystem $files
	 * @param string $publishPath
	 */
	public function __construct(Filesystem $files, $publishPath)
	{
		$this->files = $files;
		$this->publishPath = $publishPath;
	}

	/**
	 * Copy all assets from a given path to the publish path.
	 *
	 * @param string $name
	 * @param string $source
	 * @throws \RuntimeException
	 * @return bool
	 */
	public function publish($name, $source)
	{
		$destination = $this->publishPath."/packages/{$name}";

		try
		{
			$this->files->symlink($source, $destination);
		}
		catch (\Exception $e)
		{
			throw new \RuntimeException("Unable to publish assets.");
		}

		return true;
	}

}