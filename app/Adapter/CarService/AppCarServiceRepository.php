<?php

declare(strict_types=1);

namespace App\Adapter\CarService;

use Domain\CarService\CarService;
use Domain\CarService\Port\CarServiceRepository;

class AppCarServiceRepository implements CarServiceRepository
{

    function save(CarService $entity): CarService
    {
        app('db')->transaction(function () use ($entity) {

            $id = $this->table()->insertGetId([
                'car' => $entity->car()->id(),
                'created_at' => $entity->createdAt()
            ]);

            $entity->setId($id);

            foreach ($entity->details() as $detail) {
            }
        });

        return $entity;
    }

    protected function table()
    {
        return app('db')->table('car_service');
    }
}
