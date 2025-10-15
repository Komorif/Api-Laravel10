<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterUserResource extends JsonResource
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
                        'name' => $this->first_name. " ".$this->last_name. " ".$this->patronymic,
                        'email' => $this->email,
                    ],
                    'code' => 201,
                    'message' => 'Пользователь создан',
                ]
            ];
    }
}
