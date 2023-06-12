<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name'=>'administrator'],
            ['name'=>'client'],
            ['name'=>'developer'],
            ['name'=>'user'],
            ];

            DB::table('roles')->insert($data);
    }
}
