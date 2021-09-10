<?php

declare(strict_types=1);

namespace App\Http\Response;

use Domain\Common\Collection\QueryResultInterface;

class QueryResponse
{

    public static function with(QueryResultInterface $data): array
    {
        return [
            'status' => 'ok',
            'data' => $data,
        ];
    }
}
