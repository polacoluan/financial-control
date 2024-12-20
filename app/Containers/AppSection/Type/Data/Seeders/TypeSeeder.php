<?php

namespace App\Containers\AppSection\Type\Data\Seeders;

use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class TypeSeeder extends ParentSeeder
{
    public function run(): void
    {
        Type::create(["type" => "Crédito à vista", "description" => "Desepesas pagas à vista"]);
        Type::create(["type" => "Débito", "description" => "Desepesas pagas no débito"]);
        Type::create(["type" => "Financiamento", "description" => "Desepesas financiadas"]);
        Type::create(["type" => "Parcelado", "description" => "Desepesas parceladas"]);
        Type::create(["type" => "Pix", "description" => "Desepesas pagas pelo pix"]);
    }
}
