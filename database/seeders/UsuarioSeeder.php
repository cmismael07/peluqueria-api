<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Usuario::create([
            'username' => 'admin', 
            'password' => Hash::make('secret123'), // Encripta la contraseña
            // Agrega otros campos necesarios según tu modelo
        ]);
        */
        Usuario::create([
            'username' => 'isma', 
            'password' => 'secret1234'
        ]);
    }
}

