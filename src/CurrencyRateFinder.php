<?php

namespace Tigersun\Interview;

use Tigersun\Interview\Contracts\CurrencyRateInterface;
use Tigersun\Interview\Error\CurrencyRateNotAvailableException;

/**
 * In real world this class should call an external webservice and get real-time rate
 */
class CurrencyRateFinder implements CurrencyRateInterface
{
    private const RATE_FROM_USD =  [
        "EUR" => 0.89,
        "BBD" => 2,
        "ARS" => 100.78,
        "CAD" => 1.28,
        "USD" => 1,
    ];

    public function getRate(string $from, string $to): float
    {
        $availableRates = array_keys(self::RATE_FROM_USD);
        if (!in_array($from, $availableRates) || !in_array($to, $availableRates)) {
            throw new CurrencyRateNotAvailableException($from, $to);
        }

        if ($from === 'USD') {
            return self::RATE_FROM_USD[$to];
        }

        if ($to === 'USD') {
            return 1 / self::RATE_FROM_USD[$from];
        }

        return self::RATE_FROM_USD[$to] / self::RATE_FROM_USD[$from];
    }
}
