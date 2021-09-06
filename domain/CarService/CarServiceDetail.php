<?php

declare(strict_types=1);

namespace Domain\CarService;

class CarServiceDetail
{

    private Service $service;

    function __construct(
        private int $amount
    ) {
        $this->amount = $amount;
    }

    function price(): int
    {
        return $this->price;
    }

    function service(): Service
    {
        return $this->service;
    }

    function amount(): int
    {
        return $this->amount;
    }

    function setService(Service $service): void
    {
        $this->service = $service;
    }
}
