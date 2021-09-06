<?php

declare(strict_types=1);

namespace Domain\CarService\Job;

use Domain\Car\Port\CarRepository;
use Domain\CarService\CarService;
use Domain\CarService\Port\CarServiceRepository;

final class Create
{

    function __construct(
        private CarServiceRepository $repository,
        private CarRepository $carRepository
    ) {
        $this->repository = $repository;
        $this->carRepository = $carRepository;
    }

    function __invoke(
        int $car_id,
        array $service_ids
    ) {

        $car = $this->carRepository->get($car_id);

        $car_service = CarService::new(
            $car,
            new \DateTime('now')
        );

        foreach ($service_ids as $service_id) {
            $car->addService();
        }

        $this->repository->save($car_service);
        if (is_null($car->id())) {
            throw new \Exception('Could not create car service.');
        }

        return $car;
    }
}
