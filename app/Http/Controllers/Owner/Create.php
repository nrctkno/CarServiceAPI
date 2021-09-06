<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Action;
use Domain\Owner\Job\Create as CreateJob;
use Domain\Owner\Owner;
use Illuminate\Http\Request;

class Create extends Action
{

    function __invoke(Request $request, CreateJob $createOwner)
    {
        $owner = Owner::new(
            $request->get('name'),
            $request->get('surname')
        );

        $result = $createOwner($owner);

        return json_encode($owner);
    }
}
