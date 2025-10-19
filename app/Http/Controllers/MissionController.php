<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Http\Requests\StoreMissionRequest;
use App\Http\Requests\UpdateMissionRequest;

use App\Models\Crew;

use App\Http\Resources\MissionResource;
use Auth;


class MissionController extends Controller
{
    // Получение информации о лунных миссиях
    public function index()
    {
        $mission = Mission::with('crews')->get();
        return MissionResource::collection($mission);
    }

    // Добавление новой миссии
    public function store(StoreMissionRequest $request)
    {
        $mission = new Mission();
        $mission->name = $request->mission['name'];

        $mission->launch_date = $request->mission['launch_details']['launch_date'];
        $mission->launch_site_name = $request->mission['launch_details']['launch_site']['name'];
        $mission->launch_latitude = $request->mission['launch_details']['launch_site']['location']['latitude'];
        $mission->launch_longitude = $request->mission['launch_details']['launch_site']['location']['longitude'];

        $mission->landing_date = $request->mission['landing_details']['landing_date'];
        $mission->landing_site_name = $request->mission['landing_details']['landing_site']['name'];
        $mission->landing_latitude = $request->mission['landing_details']['landing_site']['coordinates']['latitude'];
        $mission->landing_longitude = $request->mission['landing_details']['landing_site']['coordinates']['longitude'];

        $mission->command_module = $request->mission['spacecraft']['command_module'];
        $mission->lunar_module = $request->mission['spacecraft']['lunar_module'];

        $mission->user_id = Auth::user()->id;
        $mission->save();

        foreach ($request->mission['spacecraft']['crew'] as $crew) {
            $crew_model = new Crew($crew);
            $crew_model->mission_id = $mission->id;
            $crew_model->save();
        }
        return response()->json(["data" => [
                "code" => 201,
                "message" => "Миссия добавлена"
            ]
        ], 201);
    }

    // Добовление новой миссии
    public function show(mission $mission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMissionRequest $request, mission $mission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mission $mission)
    {
        //
    }
}
