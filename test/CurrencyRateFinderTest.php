<?php

namespace Tigersun\Interview\Test;

use Tigersun\Interview\Contracts\CurrencyRateInterface;

class CurrencyRateFinderTest extends DITestCase
{
    /**
     * @var CurrencyRateInterface
     */
    private $currencyRateFinder;

    public function setUp(): void
    {
        parent::setUp();
        $this->currencyRateFinder = $this->container->get(CurrencyRateInterface::class);
        self::assertInstanceOf(CurrencyRateInterface::class, $this->currencyRateFinder);
    }

    /** @dataProvider provideTestGetRateTestData */
    public function testGetRate($from, $to, $expected): void
    {
        self::assertEquals($expected, $this->currencyRateFinder->getRate($from, $to));
    }

    public function provideTestGetRateTestData(): array
    {
        return [
            ['USD', 'EUR', 0.89],
            ['USD', 'BBD', 2],
            ['USD', 'ARS', 100.78],
            ['USD', 'CAD', 1.28],
            ['USD', 'USD', 1],
            ['EUR', 'USD', 1 / 0.89],
            ['BBD', 'USD', 1 / 2],
            ['ARS', 'USD', 1 / 100.78],
            ['CAD', 'USD', 1 / 1.28],
        ];
    }
}
