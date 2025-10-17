<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpaceFlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "flight_number"=> $this->flight_number,
            "destination"=> $this->destination,
            "launch_date"=> $this->launch_date,
            "seats_available"=> $this->seats_available-count($this->users),
        ];
    }
}
