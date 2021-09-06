<?php

declare(strict_types=1);

namespace App\Http\Response;

use Domain\Common\Collection\PaginatedQueryResult;

class QueryResponse
{

    public static function with(PaginatedQueryResult $data): array
    {
        return [
            'status' => 'ok',
            'data' => $data,
        ];
    }
}
