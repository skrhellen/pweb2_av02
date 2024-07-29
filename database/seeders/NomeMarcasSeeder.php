<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NomeMarcas;

class NomeMarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        NomeMarcas::insert([

            ['NomeMarcas' => "Tiffany & Co."],
            ['NomeMarcas' => "Cartier"],
            ['NomeMarcas' => "Bulgari"],
            ['NomeMarcas' => "Pandora"],
            ['NomeMarcas' => "Graff"],
            ['NomeMarcas' => "Boucheron"],
            ['NomeMarcas' => "Lagos"],
            ['NomeMarcas' => "John Hardy"],
            ['NomeMarcas' => "Monica Vinader"],
            ['NomeMarcas' => "Elsa Peretti"],
            ['NomeMarcas' => "Vivara"],
        ]);
    }
}