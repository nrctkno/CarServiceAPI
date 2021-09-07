<?php

declare(strict_types=1);

namespace Domain\CarService;

use Domain\ServiceType\ServiceType;
use JsonSerializable;

class CarServiceDetail implements JsonSerializable
{

    private CarService $service;

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

    function service(): CarService
    {
        return $this->service;
    }

    function setService(CarService $service): void
    {
        $this->service = $service;
    }

    function jsonSerialize()
    {
        return [
            'type' => $this->type,
            'amount' => $this->amount,
        ];
    }
}
