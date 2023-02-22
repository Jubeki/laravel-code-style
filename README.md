## Laravel Code Style

[![Packagist License](https://poser.pugx.org/Jubeki/laravel-code-style/license.png)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/Jubeki/laravel-code-style/version.png)](https://packagist.org/packages/jubeki/laravel-code-style)
![Tests](https://github.com/Jubeki/laravel-code-style/workflows/Tests/badge.svg)

This package provides automatic code style checking and formatting for Laravel applications and packages. Your code is formatted following Laravel's code style guide.

The package adds the [php-cs-fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer) tool and the Laravel Pint ruleset, while still giving you the ability to add custom fixers.

## Installation

> **Note**  
> These docs are for the latest version. If you are using an older version you can find the docs for previous releases [here](#releases).

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require jubeki/laravel-code-style --dev
```

Once the package is installed you should publish the configuration.

```shell
php artisan vendor:publish --provider="Jubeki\LaravelCodeStyle\ServiceProvider"
```

Publishing the config will add a `.php-cs-fixer.dist.php` configuration file to the root of your project.  You may customize this file as needed.  The `.php-cs-fixer.dist.php` file should be committed to version control.

A cache file will be written to `.php-cs-fixer.cache` in the project root the first time you run the fixer.  You should ignore this file so it is not added to your version control system.

```shell
echo '.php-cs-fixer.cache' >> .gitignore
```

## Usage

Once the package is installed you can check and fix your code formatting with the `vendor/bin/php-cs-fixer` command.

### Fixing

To automatically fix the code style of your project you may use the `php-cs-fixer fix` command.

```shell
vendor/bin/php-cs-fixer fix
```

This will automatically fix the code style of every file in your project.

By default only the file names of every file fixed will be shown.  To see a full diff of every change append the `--diff` flag.

```shell
vendor/bin/php-cs-fixer fix --diff
```

### Checking

If you would like to check the formatting without actually altering any files you should use the `fix` command with the `--dry-run` flag.

```shell
vendor/bin/php-cs-fixer fix --dry-run --diff
```

In dry-run mode any violations will [cause the command to return a non-zero exit code](https://github.com/FriendsOfPhp/PHP-CS-Fixer#exit-code). You can use this command to fail a CI build or git commit hook.

### Composer script

To make checking and fixing code style easier for contributors to your project it's recommended to add the commands as a [composer script](https://getcomposer.org/doc/articles/scripts.md).

The following example allows anyone to check the code style by calling `composer check-style` and to fix the code style with `composer fix-style`.

```json
{
    // ...
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

## Continuous Integration

To automatically fix the code style when someone opens a pull request or pushes a commit check out [StyleCI](https://styleci.io).  StyleCI wrote many of the open source fixer rules this package depends on and StyleCI's Laravel preset is the official definition of Laravel's code style.

## Editor Support

Any editor plugin for php-cs-fixer will work. Check the [php-cs-fixer readme](https://github.com/FriendsOfPhp/PHP-CS-Fixer#helpers) for more info.

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

- [Matt Allan](https://github.com/matt-allan)
- [Julius Kiekbusch](https://github.com/Jubeki)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
