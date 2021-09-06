<?php

declare(strict_types=1);

namespace Domain\Car;

use Domain\Owner\Owner;

class Car
{

    function __construct(
        private Owner $owner,
        private string $brand,
        private string $model,
        private Year $year,
        private Plate $plate,
        private Colour $colour,
    ) {
        $this->owner = $owner;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->plate = $plate;
        $this->colour = $colour;
    }

    function owner(): Owner
    {
        return $this->owner();
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
}
