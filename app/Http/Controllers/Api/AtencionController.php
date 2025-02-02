<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Atencion;


class AtencionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cita_id'        => 'required|exists:citas,id',
            'descripcion'    => 'required|string',
            'fecha_atencion' => 'required|date'
        ]);

        $atencion = Atencion::create($request->all());

        // Actualizar el estado de la cita a "atendida"
        $cita = Cita::find($request->cita_id);
        $cita->update(['estado' => 'atendida']);

        return response()->json($atencion, 201);
    }

    // Listado de todas las atenciones ordenadas de la más reciente a la más antigua
    public function index()
    {
        $atenciones = Atencion::orderBy('fecha_atencion', 'desc')->get();
        return response()->json($atenciones);
    }
}
