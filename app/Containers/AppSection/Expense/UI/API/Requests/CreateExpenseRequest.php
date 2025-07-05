<?php

namespace App\Containers\AppSection\Expense\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateExpenseRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'category_id',
        'type_id',
        'card_id'
    ];

    public function rules(): array
    {
        return [
            'expense' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
            'card_id' => 'exists:cards,id',
            'installments' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'expense.required' => 'A despesa é obrigatória',
            'expense.string' => 'A despesa deve ser do tipo texto',
            'amoumt.required' => 'O valor é obrigatório',
            'amount.numeric' => 'O valor deve ser do tipo numérico',
            'date.required' => 'A data é obrigatória',
            'date.date' => 'A data deve ser do tipo data',
            'category_id.required' => 'A categoria é obrigatória',
            'category_id.exists' => 'Categoria não encontrada',
            'type_id.required' => 'O tipo é obrigatório',
            'type_id.exists' => 'Tipo não encontrado',
            'card_id.exists' => 'Cartão não encontrado',
            'installments.numeric' => 'A parcela deve ser do tipo numérico',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
