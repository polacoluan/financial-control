<?php

namespace App\Containers\AppSection\Expense\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListExpenseWithInstallmentsRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [];

    protected array $urlParameters = [];

    public function rules(): array
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ];
    }

    public function messages()
    {
        return [
            'start.required' => 'A data de início é obrigatória.',
            'start.date'     => 'A data de início deve ser uma data válida.',
            'end.required'   => 'A data de término é obrigatória.',
            'end.date'       => 'A data de término deve ser uma data válida.',
            'end.after'      => 'A data de término deve ser posterior à data de início.',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
