<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateCategoryRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function rules(): array
    {
        return [
            'category' => 'required|string',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'A categoria é obrigatória',
            'category.string' => 'A categoria deve ser do tipo texto',
            'description.required' => 'A descrição da categoria é obrigatória',
            'description.string' => 'A descrição deve ser do tipo texto'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
