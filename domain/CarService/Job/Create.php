<?php

declare(strict_types=1);

namespace Domain\CarService\Job;

use Domain\Car\Port\CarRepository;
use Domain\CarService\CarService;
use Domain\CarService\CarServiceDetail;
use Domain\CarService\Port\CarServiceRepository;
use Domain\Common\Exception\InputException;
use Domain\Common\Exception\WorkflowException;
use Domain\ServiceType\Port\ServiceTypeRepository;

final class Create
{

    function __construct(
        private CarServiceRepository $repository,
        private ServiceTypeRepository $typeRepository,
        private CarRepository $carRepository
    ) {
        $this->repository = $repository;
        $this->typeRepository = $typeRepository;
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
            $service_type = $this->typeRepository->get($service_id);

            if (is_null($service_type)) {
                throw new InputException('Invalid service #' . $service_id);
            }

            $car_service->addDetail(
                new CarServiceDetail($service_type)
            );
        }

        $this->repository->save($car_service);
        if (is_null($car_service->id())) {
            throw new WorkflowException('Could not create car service.');
        }

        return $car_service;
    }
}
