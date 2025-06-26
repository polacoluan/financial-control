<?php

namespace App\Containers\AppSection\Objective\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateObjectiveRequest extends ParentRequest
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
            'objective' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'target_value' => 'nullable|numeric|min:0',
            'saved_amount' => 'nullable|numeric|min:0',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
