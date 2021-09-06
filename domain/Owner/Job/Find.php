<?php

declare(strict_types=1);

namespace Domain\Owner\Job;

use Domain\Common\Collection\PaginatedResultset;
use Domain\Common\Exception\InputException;
use Domain\Owner\Port\OwnerRepository;

final class Find
{

    const MAX_SIZE = 100;

    function __construct(
        private OwnerRepository $repository
    ) {
        $this->repository = $repository;
    }

    function __invoke(string $term, int $page, int $size): PaginatedResultset
    {
        if ($page < 1) {
            throw new InputException('Invalid page number');
        }
        if ($size > self::MAX_SIZE) {
            throw new InputException('Allowed maximum page size is ' . self::MAX_SIZE);
        }
        return $this->repository->find($term, $page, $size);
    }
}
