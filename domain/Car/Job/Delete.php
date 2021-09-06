<?php

declare(strict_types=1);

namespace Domain\Car\Job;

use Domain\Car\Port\CarRepository;
use Domain\Common\Exception\ModelNotFoundException;
use Domain\Owner\Port\OwnerRepository;

final class Delete
{

    function __construct(
        private CarRepository $repository,
        private OwnerRepository $ownerRepository
    ) {
        $this->repository = $repository;
        $this->ownerRepository = $ownerRepository;
    }

    function __invoke(int $id)
    {
        $car = $this->repository->get($id);

        if (is_null($car)) {
            throw new ModelNotFoundException('Could not find car #' . $id);
        }

        $this->repository->delete($car);

        return $car;
    }
}
