<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Action;
use App\Http\Response\WriteResponse;
use Domain\Owner\Job\Create as CreateOwner;
use Illuminate\Http\Request;

class Create extends Action
{

    function __invoke(Request $request, CreateOwner $createOwner)
    {
        $this->validate($request, [
            'name' => ['required', 'max:50'],
            'surname' => ['required', 'max:50'],
        ]);

        $result = $createOwner(
            $request->get('name'),
            $request->get('surname')
        );

        return response()->json(WriteResponse::with($result, WriteResponse::CREATED));
    }
}
