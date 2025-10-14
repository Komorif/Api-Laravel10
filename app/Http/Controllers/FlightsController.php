<?php

namespace App\Http\Controllers;

use App\Models\Flights;
use App\Http\Requests\StoreFlightsRequest;
use App\Http\Requests\UpdateFlightsRequest;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Flights $flights)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightsRequest $request, Flights $flights)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flights $flights)
    {
        //
    }
}
