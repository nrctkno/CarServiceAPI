<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Action;
use App\Http\Response\QueryResponse;
use Domain\Owner\Job\Find as FindOwner;
use Illuminate\Http\Request;

class Find extends Action
{

    function __invoke(Request $request, FindOwner $findOwners)
    {
        $term = $request->query->get('term', '');
        $page = $request->query->get('page', 1);
        $limit = $request->query->get('limit', 10);

        $result = $findOwners($term, $page, $limit);

        return response()->json(QueryResponse::with($result));
    }
}
