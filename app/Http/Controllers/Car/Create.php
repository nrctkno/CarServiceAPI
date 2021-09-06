<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Action;
use App\Http\Response\WriteResponse;
use Domain\Car\Job\Create as CreateCar;
use Illuminate\Http\Request;

class Create extends Action
{

    function __invoke(Request $request, CreateCar $createCar)
    {
        $result = $createCar(
            $request->get('owner'),
            $request->get('brand'),
            $request->get('model'),
            $request->get('year'),
            $request->get('plate'),
            $request->get('colour'),
        );

        return response()->json(WriteResponse::with($result, WriteResponse::CREATED));
    }
}
