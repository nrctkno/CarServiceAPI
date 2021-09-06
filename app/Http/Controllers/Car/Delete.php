<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Action;
use App\Http\Response\WriteResponse;
use Domain\Car\Job\Delete as DeleteCar;
use Illuminate\Http\Request;

class Delete extends Action
{

    function __invoke(int $id, Request $request, DeleteCar $deleteCar)
    {
        $result = $deleteCar($id);

        return response()->json(WriteResponse::with($result, WriteResponse::DELETED));
    }
}
