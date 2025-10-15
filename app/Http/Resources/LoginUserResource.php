<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => [
                    'user' => [
                        'id' => $this->id,
                        'name' => $this->first_name. " ".$this->last_name. " ".$this->patronymic,
                        'birth_date' => $this->birth_date,
                        'email' => $this->email,
                    ],
                    'token' => $this->createToken("token")->plainTextToken
                ]
        ];
    }
}
