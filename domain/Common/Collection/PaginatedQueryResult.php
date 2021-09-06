<?php

declare(strict_types=1);

namespace Domain\Common\Collection;

use JsonSerializable;

class PaginatedQueryResult implements JsonSerializable
{

    function __construct(
        private array $records,
        private int $page,
        private int $limit,
        private int $count
    ) {
        //ToDO: aserciones
    }

    public function getRecords()
    {
        return $this->records;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function jsonSerialize()
    {
        return [
            'page' => $this->page,
            'limit' => $this->limit,
            'count' => $this->count,
            'records' => $this->records
        ];
    }
}
