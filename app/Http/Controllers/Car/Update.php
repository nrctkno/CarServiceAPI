<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Action;
use App\Http\Response\WriteResponse;
use Domain\Car\Job\Update as UpdateCar;
use Illuminate\Http\Request;

class Update extends Action
{

    function __invoke(int $id, Request $request, UpdateCar $updateCar)
    {
        $result = $updateCar(
            $id,
            $request->get('owner'),
            $request->get('brand'),
            $request->get('model'),
            $request->get('year'),
            $request->get('plate'),
            $request->get('colour'),
        );

        return response()->json(WriteResponse::with($result, WriteResponse::UPDATED));
    }
}
