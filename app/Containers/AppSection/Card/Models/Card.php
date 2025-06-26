<?php

namespace App\Containers\AppSection\Card\Models;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Models\Model as ParentModel;

class Card extends ParentModel
{
    protected $fillable = [
        'card', 
        'description',
        'is_default',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
