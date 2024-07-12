<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bancos')->insert([
            [
                'banco' => '23',
                'nombre_banco' => 'BBVA',
                'clave_ref' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
