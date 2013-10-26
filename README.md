## Laravel Asset Symlinker - symlink assets from vendor's or workbench to your Laravel 4 public

##### Installation

Recommended installation is trough *composer*, add to your `composer.json`:

```json

"require": {
	"djordje/laravel-asset-symlinker": "dev-master"
}

```

##### Usage

This command is based on Laravel's `asset:publish`, so it works same way. But insted of making copy this command makes
symlink, so you can easier develop your package.

For example:

```sh

php artisan asset:symlink djordje/laravel-backend-layout --bench=djordje/laravel-backend-layout

```

###### Released under MIT licence.