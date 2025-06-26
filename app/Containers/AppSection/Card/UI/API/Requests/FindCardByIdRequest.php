<?php

namespace App\Containers\AppSection\Card\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class FindCardByIdRequest extends ParentRequest
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
            'id' => 'required|exists:cards,id',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O identificador do cartão é obrigatório',
            'id.exists' => 'Registro não encontrado'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
