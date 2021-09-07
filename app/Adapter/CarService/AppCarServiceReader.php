<?php

declare(strict_types=1);

namespace App\Adapter\CarService;

use Domain\Common\Collection\PaginatedQueryResult;
use Domain\CarService\Port\CarServiceReader;

class AppCarServiceReader implements CarServiceReader
{

    function getByCarId(int $car_id, int $page, int $limit): PaginatedQueryResult
    {
        $offset = ($page - 1) * $limit;

        $query = $this->table()
            ->where('car', '=', $car_id);

        $count = $query->count();

        $records = $query
            ->orderBy('created_at', 'ASC')
            ->skip($offset)->take($limit)
            ->get()->toArray();

        return new PaginatedQueryResult($records, $page, $limit, $count);
    }

    protected function table()
    {
        return app('db')->table('car_service');
    }
}
