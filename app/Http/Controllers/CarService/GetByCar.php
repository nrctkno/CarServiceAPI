<?php

namespace App\Http\Controllers\CarService;

use App\Http\Controllers\Action;
use App\Http\Response\QueryResponse;
use Domain\CarService\Job\GetByCar as GetCarServices;
use Illuminate\Http\Request;

class GetByCar extends Action
{

    function __invoke(int $id, Request $request, GetCarServices $getCarServices)
    {
        $page = $request->query->get('page', 1);
        $limit = $request->query->get('limit', 10);

        $result = $getCarServices($id, $page, $limit);

        return response()->json(QueryResponse::with($result));
    }
}
