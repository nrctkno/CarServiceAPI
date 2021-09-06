<?php

declare(strict_types=1);

namespace App\Adapter\Owner;

use Domain\Common\Collection\PaginatedResultset;
use Domain\Owner\Owner;
use Domain\Owner\Port\OwnerRepository;

class AppOwnerRepository implements OwnerRepository
{

    function get(int $id): ?Owner
    {
        return null;
    }

    function find(string $term, int $page, int $limit): PaginatedResultset
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

        return new PaginatedResultset($records, $page, $limit, $count);
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
