<?php

namespace App\Http\Controllers;

use App\Models\missions;
use App\Http\Requests\StoremissionsRequest;
use App\Http\Requests\UpdatemissionsRequest;

class MissionsController extends Controller
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
    public function store(StoremissionsRequest $request)
    {
        return missions::create($request->all());
    }

    // Добовление новой миссии
    public function show(missions $missions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemissionsRequest $request, missions $missions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(missions $missions)
    {
        //
    }
}
