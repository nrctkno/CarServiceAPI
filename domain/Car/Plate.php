<?php

declare(strict_types=1);

namespace Domain\Car;

class Plate
{

    public static function isValid(string $value): bool
    {
        return preg_match('/^([A-Z]{3})([-]{1})([0-9]{3})$/i', $value)
            || preg_match('/^([A-Z]{2})([ ]{1})([0-9]{3})([ ]{1})([A-Z]{2})$/i', $value);
    }

    function __construct(private string $value)
    {
        if (!self::isValid($value)) {
            throw new DomainException('Invalid plate format: ' . $value);
        }
        $this->value = strtoupper($value);
    }

    function __toString(): string
    {
        return $this->value;
    }
}
