<?php

declare(strict_types=1);

namespace Domain\CarService\Port;

use Domain\Car\Car;
use Domain\CarService\CarService;

interface CarServiceRepository
{

    function save(CarService $entity): CarService;
}
