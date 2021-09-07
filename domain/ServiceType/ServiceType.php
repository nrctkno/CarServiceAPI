<?php

declare(strict_types=1);

namespace Domain\ServiceType;

use JsonSerializable;

class ServiceType implements JsonSerializable
{

    private function __construct(
        private ?int $id,
        private string $title,
        private float $cost,
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->cost = $cost;
    }

    public static function new(
        string $title,
        float $cost,
    ) {
        return new self(null, $title, $cost);
    }

    public static function hydrate(
        int $id,
        string $title,
        float $cost
    ) {
        return new self($id, $title, $cost);
    }


    function id(): ?int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function title(): string
    {
        return $this->title;
    }

    function cost(): float
    {
        return $this->cost;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title()
        ];
    }
}
