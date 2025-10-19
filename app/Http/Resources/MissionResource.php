<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                "mission"=> [
                  "name"=> $this->name,
                  "launch_details"=> [
                    "launch_date"=> $this->launch_date,
                    "launch_site"=> [
                      "name"=> $this->launch_site_name,
                      "location"=> [
                        "latitude"=> $this->launch_latitude,
                        "longitude"=> $this->launch_longitude
                      ]
                    ]
                  ],
                  "landing_details"=> [
                    "landing_date"=> $this->landing_date,
                    "landing_site"=> [
                      "name"=> $this->landing_site_name,
                      "coordinates"=> [
                        "latitude"=> $this->landing_latitude,
                        "longitude"=> $this->landing_longitude
                      ]
                    ]
                  ],
                  "spacecraft"=> [
                    "command_module"=> $this->command_module,
                    "lunar_module"=> $this->lunar_module,
                    "crew"=> CrewResource::collection($this->crews),
                  ]
                ]
          ];
    }
}