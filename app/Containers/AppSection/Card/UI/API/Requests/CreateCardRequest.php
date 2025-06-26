<?php

namespace App\Containers\AppSection\Card\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateCardRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function rules(): array
    {
        return [
            'card' => 'required|string',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'card.required' => 'O cartão é obrigatório',
            'card.string' => 'O cartão deve sert do tipo texto',
            'description.required' => 'A descrição do cartão é obrigatória',
            'description.string' => 'A descrição do cartão deve ser do tipo texto'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
