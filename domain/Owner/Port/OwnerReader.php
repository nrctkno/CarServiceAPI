<?php

declare(strict_types=1);

namespace Domain\Owner\Port;

use Domain\Common\Collection\PaginatedQueryResult;

interface OwnerReader
{

    function find(string $term, int $page, int $limit): PaginatedQueryResult;
}
