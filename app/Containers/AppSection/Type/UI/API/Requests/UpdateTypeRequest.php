<?php

namespace App\Containers\AppSection\Type\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateTypeRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required|exists:types,id',
            'type' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O identificador de tipo é obrigatório',
            'id.exists' => 'Nenhum registro encontrado',
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
