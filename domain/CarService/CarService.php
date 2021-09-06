<?php

declare(strict_types=1);

namespace Domain\CarService;

use Domain\Car\Car;

class CarService
{

    /**
     * @var CarServiceDetail[] $details
     */
    private $details;

    function __construct(
        private Car $car,
        private \DateTime $created_at
    ) {
        $this->car = $car;
        $this->created_at = $created_at;
        $this->details = [];
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

    function total()
    {
        $total = 0;
        foreach ($this->details as $detail) {
            $total += $detail->amount();
        }
        return $total;
    }
}
