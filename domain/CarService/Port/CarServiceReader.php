<?php

declare(strict_types=1);

namespace Domain\CarService\Port;

use Domain\Common\Collection\PaginatedQueryResult;

interface CarServiceReader
{

    function getByCarId(int $car_id, int $page, int $limit): PaginatedQueryResult;
}
