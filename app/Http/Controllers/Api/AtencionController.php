<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Atencion;
use App\Models\Cita;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    // Método para listar atenciones con información de la cita y del cliente
    public function index()
    {
        $atenciones = Atencion::with('cita.cliente')
            ->orderBy('fecha_atencion', 'desc')
            ->get();
        return response()->json($atenciones);
    }

    // Método store para crear atención
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'cita_id'        => 'required|exists:citas,id',
            'descripcion'    => 'required|string',
            'fecha_atencion' => 'required|date'
        ]);

        // Crear la atención usando los datos validados
        $atencion = Atencion::create($validatedData);

        // Buscar la cita asociada y actualizar su estado a "atendida"
        $cita = Cita::find($validatedData['cita_id']);
        if ($cita) {
            $cita->update(['estado' => 'atendida']);
        } else {
            // Opcional: puedes retornar un error si la cita no se encontró,
            // pero la validación 'exists' debería garantizar que la cita exista.
        }

        return response()->json($atencion, 201);
    }
}
