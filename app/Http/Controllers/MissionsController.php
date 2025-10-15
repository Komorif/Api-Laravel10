<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use App\Http\Requests\StoremissionsRequest;
use App\Http\Requests\UpdatemissionsRequest;

use App\Http\Resources\MissionsResource;

class MissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // Добавление новой миссии
    public function store(StoremissionsRequest $request)
    {
        // Продолжить тут!!  StoremissionsRequest (тоже доделать)

        /* Пример кода 
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
        
        */
        
        //return Missions::create($request->all());
        //$mission = new Missions($request->all());
        //$mission->save();
        //return response(new MissionsResource($mission), 201);
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
