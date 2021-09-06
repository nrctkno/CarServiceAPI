<?php

declare(strict_types=1);

namespace Domain\Car;

use Domain\Owner\Owner;

class Car implements \JsonSerializable
{

    static function new(
        Owner $owner,
        \DateTime $created_at,
        string $brand,
        string $model,
        Year $year,
        Plate $plate,
        Colour $colour,
    ) {
        return new self(
            null,
            $owner,
            $created_at,
            $brand,
            $model,
            $year,
            $plate,
            $colour
        );
    }

    public static function hydrate(
        ?int $id,
        Owner $owner,
        \DateTime $created_at,
        string $brand,
        string $model,
        Year $year,
        Plate $plate,
        Colour $colour,
    ) {
        return new self(
            $id,
            $owner,
            $created_at,
            $brand,
            $model,
            $year,
            $plate,
            $colour
        );
    }


    function id(): ?int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function owner(): Owner
    {
        return $this->owner;
    }

    function createdAt(): \DateTime
    {
        return $this->created_at;
    }

    function brand(): string
    {
        return $this->brand;
    }

    function model(): string
    {
        return $this->model;
    }

    function year(): Year
    {
        return $this->year;
    }

    function plate(): Plate
    {
        return $this->plate;
    }

    function colour(): Colour
    {
        return $this->colour;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'owner' => $this->owner->jsonSerialize(),
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year->__toString(),
            'plate' => $this->plate->__toString(),
            'colour' => $this->colour->__toString(),
        ];
    }

    private function __construct(
        private ?int $id,
        private Owner $owner,
        private \DateTime $created_at,
        private string $brand,
        private string $model,
        private Year $year,
        private Plate $plate,
        private Colour $colour,
    ) {
        $this->id = $id;
        $this->owner = $owner;
        $this->created_at = $created_at;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->plate = $plate;
        $this->colour = $colour;
    }
}
