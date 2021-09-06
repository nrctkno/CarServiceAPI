<?php

namespace App\Http\Response;

use JsonSerializable;

class CreateResponse
{

    public static function with(JsonSerializable $data): array
    {
        return [
            'status' => 'created',
            'data' => $data,
        ];
    }
}
