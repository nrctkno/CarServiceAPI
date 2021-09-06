<?php

declare(strict_types=1);

namespace App\Http\Response;

use Domain\Common\Collection\PaginatedResultset;

class QueryResponse
{

    public static function with(PaginatedResultset $data): array
    {
        return [
            'status' => 'ok',
            'data' => $data,
        ];
    }
}
