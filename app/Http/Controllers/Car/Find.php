<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Action;
use App\Http\Response\QueryResponse;
use Domain\Car\Job\Find as FindCar;
use Illuminate\Http\Request;

class Find extends Action
{

    function __invoke(Request $request, FindCar $findCars)
    {
        $term = $request->query->get('term', '');
        $page = $request->query->get('page', 1);
        $limit = $request->query->get('limit', 10);

        $result = $findCars($term, $page, $limit);

        return response()->json(QueryResponse::with($result));
    }
}
