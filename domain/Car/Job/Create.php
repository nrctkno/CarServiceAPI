<?php

declare(strict_types=1);

namespace Domain\Car\Job;

use Domain\Car\Car;
use Domain\Car\Colour;
use Domain\Car\Plate;
use Domain\Car\Year;
use Domain\Car\Port\CarRepository;
use Domain\Owner\Port\OwnerRepository;

final class Create
{

    function __construct(
        private CarRepository $repository,
        private OwnerRepository $ownerRepository
    ) {
        $this->repository = $repository;
        $this->ownerRepository = $ownerRepository;
    }

    function __invoke(
        int $owner_id,
        string $brand,
        string $model,
        int $year,
        string $plate,
        string $colour
    ) {

        $owner = $this->ownerRepository->get($owner_id);

        $car = Car::new(
            $owner,
            new \DateTime('now'),
            $brand,
            $model,
            Year::new($year),
            Plate::new($plate),
            Colour::new($colour)
        );

        $this->repository->save($car);
        if (is_null($car->id())) {
            throw new \Exception('Could not create car.');
        }
        return $car;
    }
}
