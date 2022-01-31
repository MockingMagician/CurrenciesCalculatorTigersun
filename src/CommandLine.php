<?php

namespace Tigersun\Interview;

use Tigersun\Interview\Contracts\CurrencyCalculatorInterface;
use Tigersun\Interview\Error\UnexpectedInputException;

class CommandLine
{
    private CurrencyCalculatorInterface $currencyCalculator;

    public function __construct(CurrencyCalculatorInterface $currencyCalculator)
    {
        $this->currencyCalculator = $currencyCalculator;
    }

    public function __invoke($argv): void
    {
        $expressionRegexValidator = /** @lang RegExp */ '/^(\d+(?:\.\d+)?)([a-z]+)\s+(\+|-)\s+(\d+(?:\.\d+)?)([a-z]+)$/i';
        $expression = $argv[1];
        $targetCurrency = $argv[2];

        if (!isset($argv[2])) {
            throw new UnexpectedInputException('You must provide target currency');
        }

        if (false === preg_match($expressionRegexValidator, $expression, $matches)) {
            throw new UnexpectedInputException(sprintf(
                'Expression must match %s regular expression. Given: %s',
                $expressionRegexValidator,
                $expression
            ));
        }

        $amount = $this->currencyCalculator->compute($matches[1], $matches[2], $matches[3], $matches[4], $matches[5], $targetCurrency);

        echo $amount . $targetCurrency .PHP_EOL;
    }
}
