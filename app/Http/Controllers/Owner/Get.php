<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Action;


class Get extends Action
{

    function __invoke($id)
    {
        dd('getting owner #' . $id);
    }
}
