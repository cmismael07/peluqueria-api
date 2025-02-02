<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nombre'   => 'Juan Pérez',
            'telefono' => '5551234567',
            'email'    => 'juan@example.com',
        ]);

        Cliente::create([
            'nombre'   => 'María García',
            'telefono' => '5559876543',
            'email'    => 'maria@example.com',
        ]);
    }
}
