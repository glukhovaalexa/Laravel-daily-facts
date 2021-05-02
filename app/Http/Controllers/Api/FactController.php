<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Fact;
use Illuminate\Support\Facades\Artisan;

class FactController extends Controller
{
    /**
     * retun new fact every 24 hours
     *
     * @return json
     **/
    public function index(Request $request)
    {
        $fact_id = Artisan::call('fact:daily');
        if($fact_id === 0)
        {
                return response()->json([
                    'info' => 'Sorry, we are looking for new interesting facts. Try checking tomorrow'
                ], 200);
                return;
        }
        $fact = Fact::find($fact_id);
        return response()->json(['fact' => $fact], 200);
    }
}
