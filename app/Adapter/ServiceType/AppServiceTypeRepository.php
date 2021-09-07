<?php

declare(strict_types=1);

namespace App\Adapter\ServiceType;

use Domain\ServiceType\Port\ServiceTypeRepository;
use Domain\ServiceType\ServiceType;

class AppServiceTypeRepository implements ServiceTypeRepository
{

    function get(int $id): ?ServiceType
    {
        $data = $this->table()->find($id);

        if (is_null($data)) {
            return null;
        }

        $entity = ServiceType::hydrate(
            $data->id,
            $data->title,
            (float) $data->cost
        );

        return $entity;
    }

    protected function table()
    {
        return app('db')->table('service_type');
    }
}
