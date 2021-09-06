<?php

declare(strict_types=1);

namespace App\Adapter\Owner;


use Domain\Owner\Owner;
use Domain\Owner\Port\OwnerRepository;

class AppOwnerRepository implements OwnerRepository
{

    function get(int $id): ?Owner
    {
        $data = $this->table()->find($id);

        $entity = Owner::hydrate(
            $data->id,
            \DateTime::createFromFormat('Y-m-d H:i:s', $data->created_at),
            $data->name,
            $data->surname
        );

        return $entity;
    }

    function save(Owner $entity): Owner
    {
        $id = $this->table()->insertGetId([
            'created_at' => $entity->createdAt(),
            'name' => $entity->name(),
            'surname' => $entity->surname()
        ]);

        $entity->setId($id);

        return $entity;
    }

    protected function table()
    {
        return app('db')->table('owner');
    }
}
