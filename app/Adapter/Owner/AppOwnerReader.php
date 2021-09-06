<?php

declare(strict_types=1);

namespace App\Adapter\Owner;

use Domain\Common\Collection\PaginatedQueryResult;
use Domain\Owner\Port\OwnerReader;

class AppOwnerReader implements OwnerReader
{


    function find(string $term, int $page, int $limit): PaginatedQueryResult
    {
        $offset = ($page - 1) * $limit;

        $query = $this->table()
            ->where('name', 'like', "%$term%")
            ->orWhere('surname', 'like', "%$term%");

        $count = $query->count();

        $records = $query
            ->orderBy('surname', 'ASC')
            ->orderBy('name', 'ASC')
            ->skip($offset)->take($limit)
            ->get()->toArray();

        return new PaginatedQueryResult($records, $page, $limit, $count);
    }

    protected function table()
    {
        return app('db')->table('owner');
    }
}
