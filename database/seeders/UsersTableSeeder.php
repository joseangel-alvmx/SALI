<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'nombre' => 'admin',
                'nombre_usuario' => 'admin@admin.com',
                'clave' => Hash::make('1234567890'),
                'rol' => 'admin',
                'estado' => 1,
            ]
        ]);
    }
}
