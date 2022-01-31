<?php

namespace Tigersun\Interview\Contracts;

interface CurrencyCalculatorInterface
{
    public function compute(
        float $firstAmount,
        string $firstCurrency,
        string $sign,
        float $secondAmount,
        string $secondCurrency,
        string $targetCurrency
    ): float;
}
