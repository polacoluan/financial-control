<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class FindCategoryByIdRequest extends ParentRequest
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
            'id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O identificador é obrigatório'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
