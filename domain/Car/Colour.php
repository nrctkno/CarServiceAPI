<?php

declare(strict_types=1);

namespace Domain\Car;

use Domain\Common\Exception\ModelException;

class Colour
{

    public static $colours = [
        'rojo',
        'blanco',
        'negro',
        'gris plata',
        'gris oscuro',
        'azul marino',
        'azul metalizado',
        'amarillo',
    ];

    public static function isValid(string $value): bool
    {
        return in_array($value, self::$colours);
    }

    public static function fromScalar(string $value)
    {
        return new self($value);
    }

    function __toString(): string
    {
        return (string) $this->value;
    }

    private function __construct(private string $value)
    {
        if (!self::isValid($value)) {
            throw new ModelException('Invalid colour: ' . $value);
        }
        $this->value = $value;
    }
}
