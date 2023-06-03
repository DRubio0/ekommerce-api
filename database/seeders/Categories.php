<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //text - insertando informacion para llenar tabla de categories


        $data = 
        [
            ['name' => 'Computadores', 'description' => ''],
            ['name' => 'Celulares', 'description' => ''],
            ['name' => 'Monitores', 'description' => ''],
            ['name' => 'Tecnología Portátil', 'description' => ''],
            ['name' => 'Componentes Informáticos', 'description' => ''],
            ['name' => 'Audio y Video', 'description' => ''],
            ['name' => 'Periféricos', 'description' => ''],
            ['name' => 'Consumibles y Media', 'description' => ''],
            ['name' => 'Protección de Poder', 'description' => ''],
            ['name' => 'Almacenamiento', 'description' => ''],
            ['name' => 'Memorias', 'description' => ''],
            ['name' => 'Accesorios para Computadores', 'description' => ''],
            ['name' => 'Maletines', 'description' => '']
        ];
        
        DB::table('categories')->insert($data);
    }
}
