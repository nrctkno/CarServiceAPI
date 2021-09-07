<?php

declare(strict_types=1);

namespace Domain\CarService;

use Domain\Car\Car;
use JsonSerializable;

class CarService implements JsonSerializable
{

    public static function new(
        Car $car,
        \DateTime $created_at
    ) {
        return new self(null, $car, $created_at, []);
    }

    public static function hydrate(
        int $id,
        Car $car,
        \DateTime $created_at,
        array $details
    ) {
        return new self($id, $car, $created_at, $details);
    }


    function id(): ?int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function car(): Car
    {
        return $this->car;
    }

    function createdAt(): \DateTime
    {
        return $this->created_at;
    }

    function addDetail(CarServiceDetail $detail): void
    {
        $detail->setService($this);
        $this->details[] = $detail;
    }

    /**
     * @return CarServiceDetail[] $details
     */
    function details(): array
    {
        return $this->details;
    }

    function total()
    {
        $total = 0;
        foreach ($this->details as $detail) {
            $total += $detail->amount();
        }
        return $total;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'total' => $this->total(),
            'car' => $this->car->jsonSerialize(),
            'details' => $this->details()
        ];
    }
    /**
     * @var CarServiceDetail[] $details
     */
    private function __construct(
        private ?int $id,
        private Car $car,
        private \DateTime $created_at,
        private array $details = []
    ) {
        $this->id = $id;
        $this->car = $car;
        $this->created_at = $created_at;
        $this->details = $details;
    }
}
