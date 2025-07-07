<?php

namespace App\Containers\AppSection\Category\Data\Seeders;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CategorySeeder extends ParentSeeder
{
    public function run(): void
    {

        Category::create(['category' => 'Alimentação', 'description' => 'Lanches, Comidas de Rua, Almoço ou Jantar fora, entre outros...']);
        Category::create(['category' => 'Assinaturas', 'description' => 'Streamings, Academia, entre outros...']);
        Category::create(['category' => 'Almoço no Shopping', 'description' => 'Almoço no shopping']);
        Category::create(['category' => 'Combustível Carro', 'description' => 'Combustível para o carro']);
        Category::create(['category' => 'Combustível Moto', 'description' => 'Combustível para a moto']);
        Category::create(['category' => 'Estacionamento', 'description' => 'Estacionamentos pagos']);
        Category::create(['category' => 'Estacionamento Mensal', 'description' => 'Estacionamentos mensal']);
        Category::create(['category' => 'Financiamento', 'description' => 'Financiamento']);
        Category::create(['category' => 'Passeios', 'description' => 'Entradas de Estabelecimentos, cervejas, bebidas, entre outros...']);
        Category::create(['category' => 'Perfume', 'description' => 'Perfumes, Desodorantes, entre outros...']);
        Category::create(['category' => 'Roupas', 'description' => 'Camisas, calças, tẽnis, cueca, meias, entre outros...']);
        Category::create(['category' => 'Outros', 'description' => 'Outros...']);
    }
}
