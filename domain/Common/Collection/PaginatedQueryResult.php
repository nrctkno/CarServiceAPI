<?php

declare(strict_types=1);

namespace Domain\Common\Collection;

use JsonSerializable;

class PaginatedQueryResult implements JsonSerializable, QueryResultInterface
{

    function __construct(
        private array $records,
        private int $page,
        private int $limit,
        private int $count
    ) {
        //ToDO: asertions
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
            'pages' => [
                'current' => $this->page,
                'limit' => $this->limit,
                'total' => ceil($this->count / $this->limit),
            ],
            'count' => $this->count,
            'records' => $this->records
        ];
    }
}
