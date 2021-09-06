<?php

declare(strict_types=1);

namespace Domain\Owner\Job;

use Domain\Owner\Port\OwnerRepository;

final class Show
{

    function __construct(
        private OwnerRepository $repository
    ) {
        $this->repository = $repository;
    }

    function __invoke(int $id)
    {
        return $this->repository->load($id);
    }
}
