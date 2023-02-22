<?php

require __DIR__ . '/vendor/autoload.php';

return (new Jubeki\LaravelCodeStyle\Config())
        ->setFinder(
            PhpCsFixer\Finder::create()->in(__DIR__)
        );
