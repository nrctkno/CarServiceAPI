<?php

declare(strict_types=1);

namespace App\Adapter\Owner;

use Domain\Owner\Owner;
use Domain\Owner\Port\OwnerRepository;
use Illuminate\Support\Facades\DB;

class AppOwnerRepository implements OwnerRepository
{

    function get(int $id): ?Owner
    {
        return null;
    }

    /** @return Owner[] */
    function find(int $page = 1): array
    {
        return [];
    }

    function save(Owner $entity): Owner
    {
        $id = $this->getTable()->insertGetId([
            'name' => $entity->name(),
            'surname' => $entity->surname()
        ]);

        $entity->setId($id);

        return $entity;
    }

    protected function getTable()
    {
        return DB::table('owner');
    }
}
