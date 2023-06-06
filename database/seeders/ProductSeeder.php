<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [
                [
                    'name' => 'Computers',
                    'price' => '250',
                    'stock' => '50',
                    'brand' => 'DELL',
                    'image' => 'url de imagen',
                    'description' => 'articles related to desktop computers are stored',
                    'sku' => 'KSE1255',
                    'state' =>1,
                    'subcategory_id' => 5,
                ],
            ];

        DB::table('products')->insert($data);
    }
}