<?php

declare(strict_types=1);

namespace Domain\Owner;

use JsonSerializable;

class Owner implements JsonSerializable
{

    private function __construct(
        private ?int $id,
        private string $name,
        private string $surname
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public static function new(
        string $name,
        string $surname
    ) {
        return new self(null, $name, $surname);
    }

    function id(): ?int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function name(): string
    {
        return $this->name;
    }

    function surname(): string
    {
        return $this->surname;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
        ];
    }
}
