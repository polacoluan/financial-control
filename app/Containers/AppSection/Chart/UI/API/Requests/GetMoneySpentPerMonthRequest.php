<?php

namespace App\Containers\AppSection\Chart\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class GetMoneySpentPerMonthRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        'year',
        'month'
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
