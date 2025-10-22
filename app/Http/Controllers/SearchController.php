<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mission;
use App\Http\Resources\SearchResource;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        if (!$request->has("Query"))
        {
            return response()->json([
                'code'=> 422,
                'message'=> 'Validation error',
                'errors'=>[
                    'Query'=> ["must be string"],
                ]
            ], 422);
        }

        $parameter = $request->query("Query");
        
        $mission = Mission::where('name', 'LIKE', "%{$parameter}%")->get();
        
        return SearchResource::collection(resource: $mission);
    }
}
