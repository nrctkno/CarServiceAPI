<?php

declare(strict_types=1);

namespace Domain\Car;

use Domain\Common\Exception\InvalidScalarException;

class Year
{

    public static function new(int $value)
    {
        return new self($value);
    }

    public static function isValid(int $value): bool
    {
        return $value > 1890
            && $value <= ((int) date('Y') + 1);
    }

    function __toString(): string
    {
        return (string) $this->value;
    }

    private function __construct(private int $value)
    {
        if (!self::isValid($value)) {
            throw new InvalidScalarException('Invalid year format: ' . $value);
        }
        $this->value = $value;
    }
}
