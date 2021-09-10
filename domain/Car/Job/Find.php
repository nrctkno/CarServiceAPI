<?php

declare(strict_types=1);

namespace Domain\Car\Job;

use Domain\Common\Exception\InputException;
use Domain\Car\Port\CarReader;
use Domain\Car\Collection\CarsPaginatedQueryResult;

final class Find
{

    const MAX_SIZE = 100;

    function __construct(
        private CarReader $reader
    ) {
        $this->reader = $reader;
    }

    function __invoke(string $term, int $page, int $size): CarsPaginatedQueryResult
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
