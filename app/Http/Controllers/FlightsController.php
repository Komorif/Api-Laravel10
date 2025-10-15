<?php

namespace App\Http\Controllers;

use App\Models\Flights;
use App\Http\Requests\StoreFlightsRequest;
use App\Http\Requests\UpdateFlightsRequest;

use App\Http\Resources\GagarinFlightResource;

class FlightsController extends Controller
{
    public function show_gagarin_flight(Flights $flights)
    {
        return response(new GagarinFlightResource($flights), 200);
    }

    public function show_flight(Flights $flights)
    {
        return $flights;

        //return FlightResource::collection(Flights::all());
    }

    public function store_space_flights(StoreFlightsRequest $request)
    {
        return 'store_space_flights';
    }

    public function show_space_flights(Flights $flights)
    {
        return $flights;
    }

    public function store_book_flight(StoreFlightsRequest $request)
    {
        return 'store_book_flight';
    }    
}
