<?php

namespace App\Containers\AppSection\Income\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateIncomeRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function rules(): array
    {
        return [
            'income' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'income.required' => 'A entrada é obrigatória',
            'income.string' => 'A entrada deve ser do tipo texto',
            'description.required' => 'A descrição da entrada é obrigatória',
            'description.string' => 'A descrição da entrada deve ser do tipo texto',
            'amoumt.required' => 'O valor é obrigatório',
            'amount.numeric' => 'O valor deve ser do tipo numérico',
            'date.required' => 'A data é obrigatória',
            'date.date' => 'A data deve ser do tipo data',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
