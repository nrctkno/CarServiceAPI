<?php

declare(strict_types=1);

namespace Domain\Owner\Job;

use Domain\Owner\Owner;
use Domain\Owner\Port\OwnerRepository;

final class Create
{

    function __construct(
        private OwnerRepository $repository
    ) {
        $this->repository = $repository;
    }

    function __invoke(Owner $owner)
    {
        $this->repository->save($owner);
        if (is_null($owner->id())) {
            throw new \Exception('Could not create owner.');
        }
        return $owner;
    }
}
