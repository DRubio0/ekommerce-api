<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = 
        [
            ['name' => 'Laptos', 'category_id' => 1],
            ['name' => 'Desktop', 'category_id' => 1],
            ['name' => 'Tablet', 'category_id' => 1],
            ['name' => 'All-in-One', 'category_id' => 1],
            ['name' => 'Unlocked Phones', 'category_id' => 2],
            ['name' => 'Accesories', 'category_id' => 2],
            ['name' => 'Batteries and Chargers', 'category_id' => 2],
            ['name' => 'Televisions', 'category_id' => 3],
            ['name' => 'Monitors', 'category_id' => 3],
            ['name' => 'Smartwatches', 'category_id' => 4],
            ['name' => 'PActivity Trackers', 'category_id' => 4],
            ['name' => 'Processors', 'category_id' => 5],
            ['name' => 'Cases', 'category_id' => 5],
            ['name' => 'Motherboards', 'category_id' => 5],
            ['name' => 'Headphones', 'category_id' => 6],
            ['name' => 'Music Players', 'category_id' => 6],
            ['name' => 'Headphones and Headsets', 'category_id' => 7],
            ['name' => 'Microphones', 'category_id' => 7],
            ['name' => 'Tablets', 'category_id' => 7],
            ['name' => 'Speackers', 'category_id' => 7],
            ['name' => 'Keyboards', 'category_id' => 7],
            ['name' => 'Mouses', 'category_id' => 7],
            ['name' => 'Keyboard and Mouses', 'category_id' => 7],
            ['name' => 'USB HUB', 'category_id' => 7],
            ['name' => 'Toners', 'category_id' => 8],
            ['name' => 'UPS', 'category_id' => 9],
            ['name' => 'Voltage Regulators', 'category_id' => 9],
            ['name' => 'Protections', 'category_id' => 9],
            ['name' => 'HDD', 'category_id' => 10],
            ['name' => 'SSD', 'category_id' => 10],
            ['name' => 'External HDD', 'category_id' => 10],
            ['name' => 'Flash Memories', 'category_id' => 11],
            ['name' => 'RAM', 'category_id' => 11],
            ['name' => 'Flash Stick', 'category_id' => 11],
            ['name' => 'Cables', 'category_id' => 12],
            ['name' => 'Phone Cases', 'category_id' => 13]
        ];

        DB::table('subcategories')->insert($data);
    }
}
