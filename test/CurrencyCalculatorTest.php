<?php

namespace Tigersun\Interview\Test;

use Tigersun\Interview\Contracts\CurrencyCalculatorInterface;

class CurrencyCalculatorTest extends DITestCase
{
    /**
     * @var CurrencyCalculatorInterface
     */
    private $currencyCalculator;

    public function setUp(): void
    {
        parent::setUp();
        $this->currencyCalculator = $this->container->get(CurrencyCalculatorInterface::class);
        self::assertInstanceOf(CurrencyCalculatorInterface::class, $this->currencyCalculator);
    }

    /** @dataProvider provideTestGetRateTestData */
    public function testGetRate(
        float $firstAmount,
        string $firstCurrency,
        string $sign,
        float $secondAmount,
        string $secondCurrency,
        string $targetCurrency,
        float $expected
    ): void {
        self::assertEqualsWithDelta($expected, $this->currencyCalculator->compute(
            $firstAmount,
            $firstCurrency,
            $sign,
            $secondAmount,
            $secondCurrency,
            $targetCurrency
        ), 0.001);
    }

    public function provideTestGetRateTestData(): array
    {
        return [
            [1, 'USD', '+', 1, 'USD', 'USD', 2],
            [10, 'USD', '+', 20, 'BBD', 'USD', 20],
            [35.6, 'EUR', '+', 20, 'BBD', 'USD', 50],
            [20.86, 'EUR', '+', 125, 'USD', 'CAD', 190],
            [20.86, 'EUR', '+', 125, 'BBD', 'CAD', 110],
            [143.82, 'CAD', '+', 11323.6, 'ARS', 'EUR', 200],
        ];
    }
}
