<?php

namespace App\Containers\AppSection\Expense\Models;

use App\Containers\AppSection\Card\Models\Card;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Models\Model as ParentModel;

class Expense extends ParentModel
{
    protected $fillable = [
        'expense', 
        'description', 
        'amount', 
        'date', 
        'installments', 
        'category_id', 
        'type_id', 
        'card_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
