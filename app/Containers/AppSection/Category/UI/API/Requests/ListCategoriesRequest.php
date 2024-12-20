<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListCategoriesRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
