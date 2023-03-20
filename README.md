<h1 align="center">
    Laravel Code Style
</h1>

<p align="center">
    Combine Custom Fixers with the ruleset of Laravel Pint
</p>

<p align="center">
    <a href="https://github.com/Jubeki/laravel-code-style/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/Jubeki/laravel-code-style/tests.yml?branch=2.x&label=Tests&logo=github&style=for-the-badge"></a>
    <a href="https://packagist.org/packages/jubeki/laravel-code-style/stats"><img alt="Downloads Total" src="https://img.shields.io/packagist/dt/Jubeki/laravel-code-style?style=for-the-badge"></a>
    <a href="LICENSE.md"><img alt="License Type" src="https://img.shields.io/github/license/Jubeki/laravel-code-style?style=for-the-badge"></a>
    <a href="https://github.com/Jubeki/laravel-code-style/releases/latest"><img alt="Latest released version" src="https://img.shields.io/github/v/release/Jubeki/laravel-code-style?sort=semver&style=for-the-badge"></a>
</p>

<p align="center">
    <a href="https://laravel.com"><img alt="Supports Laravel 9.x and 10.x" src="https://img.shields.io/badge/Laravel-9.x|10.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://php.net"><img alt="Supports PHP 8.0, 8.1 and 8.2" src="https://img.shields.io/badge/PHP-8.0|8.1|8.2-777BB4?style=for-the-badge&logo=php"></a>
</p>

## Introduction

This package provides automatic code style checking and formatting for Laravel applications and packages using the same ruleset as [Laravel Pint](https://github.com/laravel/pint). This package is built on top of [PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) and therefor gives you the ability to add custom fixers. (which is one of the shortcomings of Laravel Pint)

## Installation

```shell
composer require jubeki/laravel-code-style --dev
```

Once the package is installed you should publish the configuration.

```shell
php artisan vendor:publish --provider="Jubeki\LaravelCodeStyle\ServiceProvider"
```

Publishing the config will add a `.php-cs-fixer.dist.php` configuration file to the root of your project. You may customize this file as needed and then commit it to your version control system.

A cache file will be written to `.php-cs-fixer.cache` in the project root the first time you run the fixer. You should ignore this file so it is not added to your version control system.

```shell
echo '.php-cs-fixer.cache' >> .gitignore
```

## Usage

Once the package is installed you can check and fix your code formatting with the on subcommand of `vendor/bin/php-cs-fixer`.

### Automatically fix the code style

To automatically fix the code style of your project you may use the following command:

```shell
vendor/bin/php-cs-fixer fix
```

By default only the file names of every file fixed will be shown.  To see a full diff of every change append the `--diff` flag.

### Checking for code style violations

If you would like to check the formatting without actually altering any files you should use the `fix` command with the `--dry-run` flag.

```shell
vendor/bin/php-cs-fixer fix --dry-run --diff
```

In dry-run mode any violations will [cause the command to return a non-zero exit code](https://github.com/FriendsOfPhp/PHP-CS-Fixer#exit-code). You can use this command to fail a CI build or git commit hook.

### Composer script

To make checking and fixing code style easier for contributors to your project it's recommended to add the commands as a [composer script](https://getcomposer.org/doc/articles/scripts.md):

```json
{
    "scripts": {
        "check-style": "php-cs-fixer fix --dry-run --diff",
        "fix-style": "php-cs-fixer fix"
    }
}
```

### More Options

For a complete list of options please consult the [PHP-CS-Fixer documentation](https://github.com/FriendsOfPhp/PHP-CS-Fixer#usage).

## Configuration

The default configuration is published as `.php-cs-fixer.dist.php` in the project root.  You can customize this file to change options such as the paths searched or the fixes applied.

### Paths

You can change the paths searched for PHP files by chaining method calls onto the `PhpCsFixer\Finder` instance being passed to the `Jubeki\LaravelCodeStyle\Config::setFinder` method.

For example, to search the `examples` directory you would append `->in('examples')`:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

return (new Jubeki\LaravelCodeStyle\Config())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(app_path())
            // ...
            ->in('examples')
    )
    // ...

```

The default paths are setup for a Laravel application.  If you are writing a package the path helper functions will not available and you will need to change the paths as necessary, i.e. `PhpCsFixer\Finder::create()->in(__DIR__)`.

For a complete list of options refer to the [Symfony Finder documentation](https://symfony.com/doc/current/components/finder.html).

### Rules

By default only the Laravel Pint preset is enabled. This preset enforces many different rules which can be found in [Jubeki\LaravelCodeStyle\Config](src/Config.php)

It is possible to override a specific rule from the preset. For example, you could disable the `no_unused_imports` rule like this:

```php
return (new Jubeki\LaravelCodeStyle\Config())
        ->setFinder(
            // ...
        )
        ->setRules([
            'no_unused_imports' => false,
        ]);
```

For a complete list of available rules please refer to the [php-cs-fixer documentation](https://github.com/FriendsOfPhp/PHP-CS-Fixer#usage).

## Releases

A major version bump only occurs should there be a big change to the Laravel Pint project.

Otherwise each rule change according to Laravel Pint is only a minor version bump. (This means there can be rules added, changed or removed).

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](./.github/CONTRIBUTING.md) for details.

## Credits

- [Julius Kiekbusch](https://github.com/Jubeki)
- [Matt Allan](https://github.com/matt-allan) (Original Creator)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
