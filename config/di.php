<?php


use Tigersun\Interview\Contracts\CurrencyCalculatorInterface;
use Tigersun\Interview\Contracts\CurrencyRateInterface;
use Tigersun\Interview\CurrencyCalculator;
use Tigersun\Interview\CurrencyRateFinder;
use function DI\autowire;

return [
  CurrencyCalculatorInterface::class => autowire(CurrencyCalculator::class),
  CurrencyRateInterface::class => autowire(CurrencyRateFinder::class),
];
