<?php

declare(strict_types=1);

namespace Domain\Car\Collection;

use Domain\Common\Collection\PaginatedQueryResult;

use stdClass;

final class CarsPaginatedQueryResult extends PaginatedQueryResult
{

    function __construct(
        private array $records,
        private int $page,
        private int $limit,
        private int $count
    ) {

        parent::__construct($records, $page, $limit, $count);

        foreach ($this->records as $key => $record) {
            $this->records[$key] = $this->aggregate($record);
        }
    }

    private function aggregate(stdClass $record): stdClass
    {
        $owner = new stdClass();

        $owner->id = $record->owner_id;
        $owner->name = $record->owner_name;
        $owner->surname = $record->owner_surname;

        $record->owner = $owner;

        unset($record->owner_id);
        unset($record->owner_name);
        unset($record->owner_surname);

        return $record;
    }
}
