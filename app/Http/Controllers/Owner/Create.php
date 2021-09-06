<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Action;
use App\Http\Response\CreateResponse;
use Domain\Owner\Job\Create as CreateOwner;
use Domain\Owner\Owner;
use Illuminate\Http\Request;

class Create extends Action
{

    function __invoke(Request $request, CreateOwner $createOwner)
    {
        $owner = Owner::new(
            new \DateTime('now'),
            $request->get('name'),
            $request->get('surname')
        );

        $result = $createOwner($owner);

        return response()->json(CreateResponse::with($result));
    }
}
