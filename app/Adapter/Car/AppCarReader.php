<?php

declare(strict_types=1);

namespace App\Adapter\Car;

use Domain\Common\Collection\PaginatedQueryResult;
use Domain\Car\Port\CarReader;

class AppCarReader implements CarReader
{

    function find(string $term, int $page, int $limit): PaginatedQueryResult
    {
        $offset = ($page - 1) * $limit;

        $query = $this->table()
            ->join('owner', function ($join) {
                $join->on('car.owner', '=', 'owner.id');
            })
            ->where('brand', 'like', "%$term%")
            ->orWhere('model', 'like', "%$term%")
            ->orWhere('surname', 'like', "%$term%")
            ->orWhere('plate', '=', $term)
            ->select('car.id', 'car.created_at', 'car.brand', 'car.model', 'car.year', 'car.plate', 'car.colour', 'car.colour', 'owner.id as owner_id', 'owner.name as owner_name', 'owner.surname as owner_surname');

        $count = $query->count();

        $records = $query
            ->orderBy('car.created_at', 'ASC')
            ->skip($offset)->take($limit)
            ->get()->toArray();

        return new PaginatedQueryResult($records, $page, $limit, $count);
    }

    protected function table()
    {
        return app('db')->table('car');
    }
}
