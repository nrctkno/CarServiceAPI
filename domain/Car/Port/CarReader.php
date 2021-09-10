<?php

declare(strict_types=1);

namespace Domain\Car\Port;

use Domain\Car\Collection\CarsPaginatedQueryResult;

interface CarReader
{

    function find(string $term, int $page, int $limit): CarsPaginatedQueryResult;
}
