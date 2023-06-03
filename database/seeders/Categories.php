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
            ['name' => 'Computers', 'description' => 'articles related to desktop computers are stored'],
            ['name' => 'Cell Phone', 'description' => 'articles related to cell phones'],
            ['name' => 'Monitors', 'description' => 'items related to monitors stored in stock'],
            ['name' => 'Postable technology', 'description' => 'laptop related items'],
            ['name' => 'Computer Components', 'description' => 'articles related to computer parts'],
            ['name' => 'Audio and Video', 'description' => ''],
            ['name' => 'Peripherals', 'description' => ''],
            ['name' => 'Consumables and Media', 'description' => ''],
            ['name' => 'Power Protection', 'description' => ''],
            ['name' => 'Storage', 'description' => ''],
            ['name' => 'Memories', 'description' => ''],
            ['name' => 'Computer Accessories', 'description' => ''],
            ['name' => 'Briefcases', 'description' => '']
        ];
        
        DB::table('categories')->insert($data);
    }
}
