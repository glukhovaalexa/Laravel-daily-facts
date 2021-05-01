<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     *Show fact every 24 hours
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ], 200);
    }
}
