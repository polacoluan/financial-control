<?php

namespace App\Containers\AppSection\Expense\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListExpensesByMonthYearAndTypeRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'type_id',
    ];

    protected array $urlParameters = [
        'year',
        'month',
        'type_id',
    ];

    public function rules(): array
    {
        return [
            'type_id' => 'required|exists:types,id',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:2000',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
