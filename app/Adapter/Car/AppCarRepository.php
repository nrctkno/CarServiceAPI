<?php

declare(strict_types=1);

namespace App\Adapter\Car;

use Domain\Car\Car;
use Domain\Car\Colour;
use Domain\Car\Plate;
use Domain\Car\Port\CarRepository;
use Domain\Car\Year;
use Domain\Owner\Port\OwnerRepository;

class AppCarRepository implements CarRepository
{
    function __construct(private OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    function get(int $id): ?Car
    {
        $data = $this->table()->find($id);

        if (is_null($data)) {
            return null;
        }

        $owner = $this->ownerRepository->get($data->owner);

        $entity = Car::hydrate(
            $data->id,
            $owner,
            \DateTime::createFromFormat('Y-m-d H:i:s', $data->created_at),
            $data->brand,
            $data->model,
            Year::new($data->year),
            Plate::new($data->plate),
            Colour::new($data->colour),
        );

        return $entity;
    }

    function save(Car $entity): Car
    {
        $id = $this->table()->insertGetId([
            'owner' => $entity->owner()->id(),
            'created_at' => $entity->createdAt(),
            'brand' => $entity->brand(),
            'model' => $entity->model(),
            'year' => $entity->year(),
            'plate' => $entity->plate(),
            'colour' => $entity->colour()
        ]);

        $entity->setId($id);

        return $entity;
    }

    function update(Car $entity): Car
    {
        $this->table()
            ->where('id', $entity->id())
            ->update([
                'owner' => $entity->owner()->id(),
                'created_at' => $entity->createdAt(),
                'brand' => $entity->brand(),
                'model' => $entity->model(),
                'year' => $entity->year(),
                'plate' => $entity->plate(),
                'colour' => $entity->colour()
            ]);

        return $entity;
    }

    function delete(Car $entity): void
    {
        $this->table()
            ->where('id', $entity->id())
            ->delete();
    }

    protected function table()
    {
        return app('db')->table('car');
    }
}
