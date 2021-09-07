<?php

declare(strict_types=1);

namespace Domain\ServiceType\Port;

use Domain\ServiceType\ServiceType;

interface ServiceTypeRepository
{

    function get(int $id): ?ServiceType;
}
