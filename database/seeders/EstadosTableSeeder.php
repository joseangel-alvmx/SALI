<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            [
                'estado' => 'apl',
                'descripcion' => 'Aplicado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado' => 'asi',
                'descripcion' => 'Asignado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado' => 'cnl',
                'descripcion' => 'Cancelado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado' => 'new',
                'descripcion' => 'Nuevo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado' => 'nid',
                'descripcion' => 'No Identificado',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
