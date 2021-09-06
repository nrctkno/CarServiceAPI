<?php

declare(strict_types=1);

namespace Domain\Car\Port;

use Domain\Car\Car;

interface CarRepository
{

    function get(int $id): ?Car;

    function save(Car $entity): Car;

    function update(Car $entity): Car;

    function delete(Car $entity): void;
}
