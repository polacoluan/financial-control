<?php

namespace App\Containers\AppSection\Type\Data\Seeders;

use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class TypeSeeder extends ParentSeeder
{
    public function run(): void
    {
        Type::create(["type" => "Crédito à vista", "description" => "despesas pagas à vista"]);
        Type::create(["type" => "Débito", "description" => "despesas pagas no débito"]);
        Type::create(["type" => "Financiamento", "description" => "despesas financiadas"]);
        Type::create(["type" => "Parcelado", "description" => "despesas parceladas"]);
        Type::create(["type" => "Pix", "description" => "despesas pagas pelo pix"]);
    }
}
