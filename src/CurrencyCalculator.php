<?php

namespace Tigersun\Interview;

use Tigersun\Interview\Contracts\CurrencyCalculatorInterface;
use Tigersun\Interview\Contracts\CurrencyRateInterface;

class CurrencyCalculator implements CurrencyCalculatorInterface
{
    private CurrencyRateFinder $currencyRateFinder;

    public function __construct(CurrencyRateInterface $currencyRateFinder)
    {
        $this->currencyRateFinder = $currencyRateFinder;
    }

    public function compute(float $firstAmount, string $firstCurrency, string $sign, float $secondAmount, string $secondCurrency, string $targetCurrency): float
    {
        $rateForFirst = $this->currencyRateFinder->getRate($firstCurrency, $targetCurrency);
        $rateForSecond = $this->currencyRateFinder->getRate($secondCurrency, $targetCurrency);

        if ($sign === '+') {
            return $firstAmount * $rateForFirst + $secondAmount * $rateForSecond;
        }

        return $firstAmount * $rateForFirst - $secondAmount * $rateForSecond;
    }
}
