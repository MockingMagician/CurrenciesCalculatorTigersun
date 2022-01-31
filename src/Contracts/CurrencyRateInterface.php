<?php

declare(strict_types=1);

namespace Tigersun\Interview\Contracts;

interface CurrencyRateInterface
{
    public function getRate(string $from, string $to): float;
}
