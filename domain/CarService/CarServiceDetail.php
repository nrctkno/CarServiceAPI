<?php

declare(strict_types=1);

namespace Domain\CarService;

use Domain\ServiceType\ServiceType;
use JsonSerializable;

class CarServiceDetail implements JsonSerializable
{

    private CarService $carService;

    function __construct(
        private ServiceType $type
    ) {
        $this->type = $type;
        $this->amount = $type->cost();
    }

    function type(): ServiceType
    {
        return $this->type;
    }

    function amount(): float
    {
        return $this->amount;
    }

    function carService(): CarService
    {
        return $this->carService;
    }

    function setCarService(CarService $carService): void
    {
        $this->carService = $carService;
    }

    function jsonSerialize()
    {
        return [
            'type' => $this->type,
            'amount' => $this->amount,
        ];
    }
}
