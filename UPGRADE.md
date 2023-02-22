# Upgrade Guide from 1.x to 2.x

This major version is for changing the preset from StyleCI to Laravel Pint.

## Update `composer.json`

Change the version constraints of `jubeki/laravel-code-style` to `^2.0`.

## Update `.php-cs-fixer.dist.php`

There are some small changes to the configuration of PHP-CS-Fixer.

It is no longer possible to set `@Laravel` or `@Laravel:risky`. Instead the rules from Laravel Pint will be enabled by default. You can still overwrite the rules with new values as before.

The default Configuration looks like this now:

```php
<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/bootstrap/app.php';

return (new Jubeki\LaravelCodeStyle\Config())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->notName('*.blade.php')
            ->in(app_path())
            ->in(config_path())
            ->in(database_path('factories'))
            ->in(database_path('migrations'))
            ->in(database_path('seeders'))
            ->in(lang_path())
            ->in(base_path('routes'))
            ->in(base_path('tests'))
    )
    ->setRules([
        // Here you can adjust the rules as much as needed
    ]);
```
