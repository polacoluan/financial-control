<?php

namespace App\Containers\AppSection\Type\Models;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Models\Model as ParentModel;

class Type extends ParentModel
{
    protected $fillable = ['type', 'description', 'is_default', 'installments'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
