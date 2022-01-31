<?php

namespace Tigersun\Interview\Test\Example;

use Tigersun\Interview\Example\Service;
use Tigersun\Interview\Test\DITestCase;

/**
 * DO NOT ADD TESTS IN THIS CLASS !!!
 */
class DependencyInjectionTest extends DITestCase
{
    private Service $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->container->get(Service::class);
    }

    /**
     * @test
     */
    public function shouldInjectProperly(): void
    {
        $this->assertNotNull($this->service);
    }
}
