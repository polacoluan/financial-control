<?php

namespace App\Containers\AppSection\Type\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class FindTypeByIdRequest extends ParentRequest
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
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O identificador de tipo é obrigatório',
            'id.exists' => 'Nenhum registro encontrado'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
