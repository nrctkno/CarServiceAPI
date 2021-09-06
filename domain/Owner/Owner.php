<?php

declare(strict_types=1);

namespace Domain\Owner;

use DateTime;
use JsonSerializable;

class Owner implements JsonSerializable
{

    private function __construct(
        private ?int $id,
        private \DateTime $created_at,
        private string $name,
        private string $surname
    ) {
        $this->id = $id;
        $this->created_at = $created_at;
        $this->name = $name;
        $this->surname = $surname;
    }

    public static function new(
        \DateTime $created_at,
        string $name,
        string $surname
    ) {
        return new self(null, $created_at, $name, $surname);
    }

    public static function hydrate(
        int $id,
        \DateTime $created_at,
        string $name,
        string $surname
    ) {
        return new self($id, $created_at, $name, $surname);
    }


    function id(): ?int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function createdAt(): DateTime
    {
        return $this->created_at;
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
            'created_at' => $this->created_at,
            'name' => $this->name,
            'surname' => $this->surname,
        ];
    }
}
