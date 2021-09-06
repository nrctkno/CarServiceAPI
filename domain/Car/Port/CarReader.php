<?php

declare(strict_types=1);

namespace Domain\Car\Port;

use Domain\Common\Collection\PaginatedQueryResult;

interface CarReader
{

    function find(string $term, int $page, int $limit): PaginatedQueryResult;
}
