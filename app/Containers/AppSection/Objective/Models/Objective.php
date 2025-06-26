<?php

namespace App\Containers\AppSection\Objective\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Objective extends ParentModel
{
    protected $fillable = [
        'objective',
        'description',
        'target_value',
        'saved_amount',
    ];

    protected $casts = [
        'target_value' => 'decimal:2',
        'saved_amount' => 'decimal:2',
    ];
}
