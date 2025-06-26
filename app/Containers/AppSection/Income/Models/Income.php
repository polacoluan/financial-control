<?php

namespace App\Containers\AppSection\Income\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Income extends ParentModel
{
    protected $fillable = [
        'income',
        'description',
        'amount',
        'date'
    ];
}
