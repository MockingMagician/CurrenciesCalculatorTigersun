<?php

namespace Tigersun\Interview\Test;

use DI\Container;
use DI\ContainerBuilder;
use PHPUnit\Framework\TestCase;

abstract class DITestCase extends TestCase
{
    protected Container $container;

    protected function setUp(): void
    {
        parent::setUp();
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(__DIR__."/../config/di.php");
        $containerBuilder->useAutowiring(true);
        $this->container = $containerBuilder->build();
    }
}
