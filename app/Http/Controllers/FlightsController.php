<?php

namespace App\Http\Controllers;

use App\Models\Flights;

use App\Http\Requests\StoreSpaceFlightsRequest;
use App\Http\Requests\StoreBookFlightsRequest;

use App\Http\Requests\UpdateFlightsRequest;

use App\Http\Resources\GagarinFlightResource;
use Auth;

class FlightsController extends Controller
{
    public function show_gagarin_flight(Flights $flights)
    {
        return response(new GagarinFlightResource($flights), 200);
    }

    // НЕРАБОТАЕТ
    public function show_flights(Flights $flights)
    {
        return 'flights';
    }

    public function store_space_flights(StoreSpaceFlightsRequest $request)
    {
        $user=Auth::user();
        $flight = new Flights($request->all());
        $flight->user_id = $user->id;
        $flight->save();

        return response()->json([
            "data"=>[
                "code"=> 201,
                "message"=> "Космический полет создан"
            ]
        ], 201);
    }

    public function show_space_flight(Flights $flights)
    {
        return Flights::all()->makeHidden(['id', 'user_id', 'created_at', 'updated_at']);
    }


    // НЕРАБОТАЕТ
    public function store_book_flight(StoreBookFlightsRequest $request)
    {
        $user = Auth::user();
        $flights = Flights::where('flight_number', $request->flight_number)->first();
        
        if ($flights==null)
        {
            return response()->json([
                'code'=> 422,
                'message'=> 'Validation error',
                'errors'=>[
                    'flight_number'=> ["field flight_number can not be blank"],
                ]
            ]);
        }

        if ($flights->seats_available - $flights->flight_user->count() == 0) {
            return response()->json(
                ["message" => "Свободных мест нет"]
            , 403);
        }

        $flights->users()->attach($user->id);
        return response()->json([
            "data"=>[
                "message"=> 'Рейс забронирован',
            ]
        ], 201);
    }    
}
