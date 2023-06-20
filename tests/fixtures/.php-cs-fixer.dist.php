<?php

require __DIR__ . '/../../vendor/autoload.php';

return (new Jubeki\LaravelCodeStyle\Config())
    ->setRules([
        'no_unused_imports' => false,
    ]);
