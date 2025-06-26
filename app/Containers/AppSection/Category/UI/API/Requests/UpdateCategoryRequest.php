<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateCategoryRequest extends ParentRequest
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
            'category' => 'string',
            'description' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O identificador é obrigatório',
            'category.string' => 'A categoria deve ser do tipo texto',
            'description' => 'A descrição deve ser do tipo texto',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
