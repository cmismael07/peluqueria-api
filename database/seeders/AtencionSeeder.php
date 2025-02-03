<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Atencion;
use App\Models\Cita;
use Carbon\Carbon;

class AtencionSeeder extends Seeder
{
    public function run()
    {
        // Obtener la primera cita de prueba; si no existe, crear una
        $cita = Cita::first();
        if (!$cita) {
            $cita = Cita::create([
                'cliente_id' => 1, // Ajusta este valor según tus datos o crea un cliente de prueba
                'fecha'      => Carbon::now()->toDateString(),
                'hora'       => Carbon::now()->toTimeString(),
                'estado'     => 'programada'
            ]);
        }

        // Crear registros de atenciones de prueba
        Atencion::create([
            'cita_id'        => $cita->id,
            'descripcion'    => 'Corte de pelo y afeitado',
            'fecha_atencion' => Carbon::now()->toDateTimeString(),
        ]);

        Atencion::create([
            'cita_id'        => $cita->id,
            'descripcion'    => 'Manicure y pedicure',
            'fecha_atencion' => Carbon::now()->addDay()->toDateTimeString(),
        ]);

        Atencion::create([
            'cita_id'        => $cita->id,
            'descripcion'    => 'Tratamiento capilar',
            'fecha_atencion' => Carbon::now()->addDays(2)->toDateTimeString(),
        ]);
    }
}
