<?php

namespace App\Containers\AppSection\Category\Models;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Models\Model as ParentModel;

class Category extends ParentModel
{
    protected $fillable = [
        'category', 
        'description'
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
