<?php

declare(strict_types=1);

namespace Domain\Owner\Job;

use Domain\Common\Collection\PaginatedQueryResult;
use Domain\Common\Exception\InputException;
use Domain\Owner\Port\OwnerReader;

final class Find
{

    const MAX_SIZE = 100;

    function __construct(
        private OwnerReader $reader
    ) {
        $this->reader = $reader;
    }

    function __invoke(string $term, int $page, int $size): PaginatedQueryResult
    {
        if ($page < 1) {
            throw new InputException('Invalid page number');
        }
        if ($size > self::MAX_SIZE) {
            throw new InputException('Allowed maximum page size is ' . self::MAX_SIZE);
        }
        return $this->reader->find($term, $page, $size);
    }
}
