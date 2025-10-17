<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mission.name'=> ['required', 'string'],

            'mission.launch_details.launch_date'=> ['required', 'date'],
            'mission.launch_details.launch_site_name'=> ['string'], //
            'mission.launch_details.location.launch_latitude'=> ['numeric'],//
            'mission.launch_details.location.launch_longitude'=> ['numeric'],//

            'mission.landing_details.landing_date'=> ['required', 'date'],
            'mission.landing_details.landing_site_name'=> ['string'],
            'mission.landing_details.coordinates.landing_latitude'=> ['numeric'],//
            'mission.landing_details.coordinates.landing_longitude'=> ['numeric'], //
            
            'mission.spacecraft.command_module'=> ['required', 'string'],
            'mission.spacecraft.lunar_module'=> ['required', 'string'],

            'mission.spacecraft.crew'=> ['required', 'array'],
            'mission.spacecraft.crew.*.name'=> ['required', 'string'],
            'mission.spacecraft.crew.*.role'=> ['required', 'string'],
        ];
    }
}
