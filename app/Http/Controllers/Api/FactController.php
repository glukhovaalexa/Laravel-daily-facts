<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Fact;

class FactController extends Controller
{
    /**
     * retun new fact every 24 hours
     *
     * @return json
     **/
    public function index(Request $request)
    {
        //get fact shown in current time
        $fact = $this->getShowedFact();
        if(!$fact)
        {
            $facts = Fact::where('status', 0)->get();
            //there aren`t any facts where status 0
            if(count($facts) === 0)
            {
                return response()->json([
                    'info' => 'Sorry, we are looking for new interesting facts. Try checking tomorrow'
                ], 200);
                return;
            }
            //generate random key
            $key = rand(0 , count($facts) - 1);
            //get random fact, where status 0
            $fact = $facts[$key];
            //set current date an time
            $fact->created_at = Carbon::now()->format("Y-m-d H:i:s");
            //set status
            $fact->status = 1;
            $fact->save();
        }

        return response()->json(['fact' => $fact], 200);
    }

    /**
     * get fact shown in current time
     * @return array
     **/
    protected function getShowedFact()
    {
        $fact = [];
        $current = Carbon::now();

        $factsShowed = Fact::where([
            'status'=> 1
        ])->get();

        foreach($factsShowed as $factShowed)
        {
            //diff between current time and created_at
            if($current->diffInMinutes($factShowed->created_at) < env('FACT_TIME'))
            {
                $fact = $factShowed;
            }
        }
        return $fact;
    }
}
