<?php

declare(strict_types=1);

namespace Domain\Car;

class Colour
{

    public static function isValid(int $value): bool
    {
        return $value > 1890
            && $value <= ((int) date('Y') + 1);
    }

    function __construct(private int $value)
    {
        if (!self::isValid($value)) {
            throw new ValidationExce('Invalid year format: ' . $value);
        }
        $this->value = $value;
    }

    function __toString(): string
    {
        return (string) $this->value;
    }
}
