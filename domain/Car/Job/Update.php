<?php

declare(strict_types=1);

namespace Domain\Car\Job;

use Domain\Car\Car;
use Domain\Car\Colour;
use Domain\Car\Plate;
use Domain\Car\Year;
use Domain\Car\Port\CarRepository;
use Domain\Common\Exception\ModelNotFoundException;
use Domain\Owner\Port\OwnerRepository;

final class Update
{

    function __construct(
        private CarRepository $repository,
        private OwnerRepository $ownerRepository
    ) {
        $this->repository = $repository;
        $this->ownerRepository = $ownerRepository;
    }

    function __invoke(
        int $id,
        int $owner_id,
        string $brand,
        string $model,
        int $year,
        string $plate,
        string $colour
    ) {
        $car = $this->repository->get($id);
        if (is_null($car)) {
            throw new ModelNotFoundException('Could not find car #' . $id);
        }

        $owner = $this->ownerRepository->get($owner_id);

        $car = Car::hydrate(
            $id,
            $owner,
            new \DateTime('now'),
            $brand,
            $model,
            Year::fromScalar($year),
            Plate::fromScalar($plate),
            Colour::fromScalar($colour)
        );

        $this->repository->update($car);

        return $car;
    }
}
