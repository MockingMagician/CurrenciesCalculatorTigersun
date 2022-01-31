<?php

namespace Tigersun\Interview\Error;


class CurrencyRateNotAvailableException extends \UnexpectedValueException
{
    public function __construct(string $from, string $to, $code = 0, \Throwable $previous = null)
    {
        parent::__construct(sprintf('Currency rate from %s to %s not found.', $from, $to), $code, $previous);
    }
}
