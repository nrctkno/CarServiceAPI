<?php

declare(strict_types=1);

namespace Domain\Owner\Job;

use Domain\Common\Exception\WorkflowException;
use Domain\Owner\Owner;
use Domain\Owner\Port\OwnerRepository;

final class Create
{

    function __construct(
        private OwnerRepository $repository
    ) {
        $this->repository = $repository;
    }

    function __invoke(string $name, string $surname): Owner
    {
        $owner = Owner::new(
            new \DateTime('now'),
            $name,
            $surname
        );

        $this->repository->save($owner);
        if (is_null($owner->id())) {
            throw new WorkflowException('Could not create owner.');
        }
        return $owner;
    }
}
