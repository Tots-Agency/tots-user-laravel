<?php

namespace Tots\User\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Tots\Auth\Models\TotsUser;

class TotsUserController extends \Illuminate\Routing\Controller
{
    use ValidatesRequests;

    public function list(Request $request)
    {
        // Create query
        $elofilter = \Tots\EloFilter\Query::run(TotsUser::class, $request);
        // Execute query
        return $elofilter->execute();
    }
}
