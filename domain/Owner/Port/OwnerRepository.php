<?php

declare(strict_types=1);

namespace Domain\Owner\Port;

use Domain\Owner\Owner;

interface OwnerRepository
{

    function get(int $id): ?Owner;

    function save(Owner $entity): Owner;
}
