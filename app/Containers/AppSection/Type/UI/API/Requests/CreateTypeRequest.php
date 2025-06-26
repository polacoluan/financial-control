<?php

namespace App\Containers\AppSection\Type\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateTypeRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'O tipo é obrigatório',
            'type.string' => 'O tipo deve ser do tipo texto',
            'description.required' => 'A descrição do tipo é obrigatória',
            'description.string' => 'A descrição do tipo deve ser do tipo texto'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
