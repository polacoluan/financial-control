<?php

namespace App\Containers\AppSection\Expense\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateExpenseRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'id',
        'category_id',
        'type_id',
        'card_id'
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required|exists:expenses,id',
            'expense' => 'required|string',
            'description' => 'required|string',
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
            'id.required' => 'O identificador da despesa é obrigatório',
            'id.exists' => 'Nenhum registro encontrado',
            'expense.required' => 'A despesa é obrigatória',
            'expense.string' => 'A despesa deve ser do tipo texto',
            'description.required' => 'A descrição da despesa é obrigatória',
            'description.string' => 'A descrição da despesa deve ser do tipo texto',
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
