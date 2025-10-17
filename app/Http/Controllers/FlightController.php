<?php

namespace App\Http\Controllers;

use App\Models\Flight;

use App\Http\Requests\StoreSpaceFlightRequest;
use App\Http\Requests\StoreBookFlightRequest;

use App\Http\Requests\UpdateFlightRequest;

use App\Http\Resources\GagarinFlightResource;
use App\Http\Resources\SpaceFlightResource;
use App\Http\Resources\FlightResource;

use Auth;

class FlightController extends Controller
{
    public function show_gagarin_flight(Flight $flight)
    {
        return response(new GagarinFlightResource($flight), 200);
    }

    public function index_flight(Flight $flight)
    {
        return response(new FlightResource($flight),200);
    }

    public function store_space_flights(StoreSpaceFlightRequest $request)
    {
        $user=Auth::user();
        $flight = new Flight($request->all());
        $flight->user_id = $user->id;
        $flight->save();

        return response()->json([
            "data"=>[
                "code"=> 201,
                "message"=> "Космический полет создан"
            ]
        ], 201);
    }

    public function index_space_flights()
    {
        $user=Auth::user();
        $flight = Flight::where('user_id', $user->id)->get();
        $flight = [...$flight, ...$user->flight];
        return SpaceFlightResource::collection($flight);
    }

    public function store_book_flight(StoreBookFlightRequest $request)
    {
        $user = Auth::user();
        $flight = Flight::where('flight_number', $request->flight_number)->first();
        
        if ($flight==null)
        {
            return response()->json([
                'code'=> 422,
                'message'=> 'Validation error',
                'errors'=>[
                    'flight_number'=> ["field flight_number can not be blank"],
                ]
            ]);
        }

        if ($flight->seats_available - $flight->users->count() == 0) {
            return response()->json(
                ["message" => "Свободных мест нет"]
            , 403);
        }

        $flight->users()->attach($user->id);
        return response()->json([
            "data"=>[
                "message"=> 'Рейс забронирован',
            ]
        ], 201);
    }    
}
