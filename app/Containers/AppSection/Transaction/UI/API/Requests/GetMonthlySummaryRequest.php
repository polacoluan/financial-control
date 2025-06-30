<?php

namespace App\Containers\AppSection\Transaction\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class GetMonthlySummaryRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [];

    protected array $urlParameters = [
        'year',
        'month',
    ];

    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
