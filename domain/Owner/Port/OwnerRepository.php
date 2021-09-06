<?php

declare(strict_types=1);

namespace Domain\Owner\Port;

use Domain\Owner\Owner;

interface OwnerRepository
{

    function get(int $id): ?Owner;

    /** @return Owner[] */
    function find(int $page = 1): array;

    function save(Owner $owner): Owner;
}
