<?php

declare(strict_types=1);

namespace Jubeki\LaravelCodeStyle;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function test_can_use_laravel_presets()
    {
        $config = (new Config)->setRiskyAllowed(true);

        $this->assertSame(
            Config::RULE_DEFINITIONS,
            $config->getRules()
        );
    }

    public function test_can_override_preset_rules()
    {
        $config = (new Config)
            ->setRules([
                'visibility_required' => false,
            ]);

        $this->assertFalse(
            $config->getRules()['visibility_required']
        );
    }
}
