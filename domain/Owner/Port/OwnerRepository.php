<?php

declare(strict_types=1);

namespace Domain\Owner\Port;

use Domain\Common\Collection\PaginatedResultset;
use Domain\Owner\Owner;

interface OwnerRepository
{

    function get(int $id): ?Owner;

    /** @return Owner[] */
    function find(string $term, int $page, int $limit): PaginatedResultset;

    function save(Owner $owner): Owner;
}
