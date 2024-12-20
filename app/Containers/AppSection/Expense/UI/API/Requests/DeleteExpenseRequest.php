<?php

namespace App\Containers\AppSection\Expense\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class DeleteExpenseRequest extends ParentRequest
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
            'id' => 'required|exists:expenses,id',
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Nenhum registro encontrado',
            'id.required' => 'O identificador da despesa é obrigatório'
        ];        
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
