<?php

namespace App\Http\Response;

use JsonSerializable;

class WriteResponse
{

    const CREATED = 'created';
    const UPDATED = 'updated';
    const DELETED = 'deleted';


    public static function with(JsonSerializable $data, string $status): array
    {
        if (!self::validateStatus($status)) {
            throw new \Exception('Invalid reponse status: ' . $status);
        }

        return [
            'status' => $status,
            'data' => $data,
        ];
    }

    public static function validateStatus(string $status): bool
    {
        $statuses = [self::CREATED, self::UPDATED, self::DELETED];

        return in_array($status, $statuses);
    }
}
