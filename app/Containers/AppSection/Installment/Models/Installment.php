<?php

namespace App\Containers\AppSection\Installment\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Installment extends ParentModel
{
    protected $fillable = [
        'installment',
    ];
    protected $primaryKey = "installment_id";
}
