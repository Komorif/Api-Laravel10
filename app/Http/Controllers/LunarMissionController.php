<?php

namespace App\Http\Controllers;

use App\Models\LunarMissions;
use App\Http\Requests\StoreLunarMissionsRequest;
use App\Http\Requests\UpdateLunarMissionsRequest;

class LunarMissionController extends Controller
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
    public function store(StoreLunarMissionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LunarMissions $lunarMissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLunarMissionsRequest $request, LunarMissions $lunarMissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LunarMissions $lunarMissions)
    {
        //
    }
}
