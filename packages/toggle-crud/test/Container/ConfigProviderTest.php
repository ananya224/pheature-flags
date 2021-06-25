<?php

declare(strict_types=1);

namespace Pheature\Test\Crud\Toggle\Container;

use Pheature\Crud\Psr11\Toggle\CreateFeatureFactory;
use Pheature\Crud\Psr11\Toggle\DisableFeatureFactory;
use Pheature\Crud\Psr11\Toggle\EnableFeatureFactory;
use Pheature\Crud\Psr11\Toggle\RemoveFeatureFactory;
use Pheature\Crud\Psr11\Toggle\RemoveStrategyFactory;
use Pheature\Crud\Psr11\Toggle\SetStrategyFactory;
use Pheature\Crud\Toggle\Container\ConfigProvider;
use Pheature\Crud\Toggle\Handler\CreateFeature;
use Pheature\Crud\Toggle\Handler\DisableFeature;
use Pheature\Crud\Toggle\Handler\EnableFeature;
use Pheature\Crud\Toggle\Handler\RemoveFeature;
use Pheature\Crud\Toggle\Handler\RemoveStrategy;
use Pheature\Crud\Toggle\Handler\SetStrategy;
use PHPUnit\Framework\TestCase;

final class ConfigProviderTest extends TestCase
{
    private const EXPECTED_CONFIG = [
        'dependencies' => [
            'factories' => [
                CreateFeature::class => CreateFeatureFactory::class,
                SetStrategy::class => SetStrategyFactory::class,
                RemoveStrategy::class => RemoveStrategyFactory::class,
                EnableFeature::class => EnableFeatureFactory::class,
                DisableFeature::class => DisableFeatureFactory::class,
                RemoveFeature::class => RemoveFeatureFactory::class,
            ],
        ],
    ];

    public function testItShouldCreateTheCorrectConfiguration(): void
    {
        $actual = (new ConfigProvider())->__invoke();

        self::assertSame(self::EXPECTED_CONFIG, $actual);
    }
}
