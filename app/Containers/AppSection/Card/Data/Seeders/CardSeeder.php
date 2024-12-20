<?php

namespace App\Containers\AppSection\Card\Data\Seeders;

use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CardSeeder extends ParentSeeder
{
    public function run(): void
    {
        Card::create(["card" => "Itau", "description" => "Cartão do Itau"]);
        Card::create(["card" => "NuBank", "description" => "Cartão do Nubank"]);
    }
}
