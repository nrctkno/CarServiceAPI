<?php

namespace App\Http\Controllers\CarService;

use App\Http\Controllers\Action;
use App\Http\Response\WriteResponse;
use Domain\CarService\Job\Create as CreateCarService;
use Illuminate\Http\Request;

class Create extends Action
{

    function __invoke(int $id, Request $request, CreateCarService $createCarService)
    {
        $result = $createCarService(
            $id,
            $request->get('services')
        );

        return response()->json(WriteResponse::with($result, WriteResponse::CREATED));
    }
}
