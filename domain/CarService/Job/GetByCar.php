<?php

declare(strict_types=1);

namespace Domain\CarService\Job;

use Domain\Common\Collection\PaginatedQueryResult;
use Domain\Common\Exception\InputException;
use Domain\CarService\Port\CarServiceReader;

final class GetByCar
{

    const MAX_SIZE = 100;

    function __construct(
        private CarServiceReader $reader
    ) {
        $this->reader = $reader;
    }

    function __invoke(int $car_id, int $page, int $size): PaginatedQueryResult
    {
        if ($page < 1) {
            throw new InputException('Invalid page number');
        }
        if ($size < 1) {
            throw new InputException('Invalid page size');
        }
        if ($size > self::MAX_SIZE) {
            throw new InputException('Allowed maximum page size is ' . self::MAX_SIZE);
        }

        return $this->reader->getByCarId($car_id, $page, $size);
    }
}
