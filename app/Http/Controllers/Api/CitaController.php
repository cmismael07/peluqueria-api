<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    // Agendar una nueva cita
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha'      => 'required|date',
            'hora'       => 'required'
        ]);

        $cita = Cita::create([
            'cliente_id' => $request->cliente_id,
            'fecha'      => $request->fecha,
            'hora'       => $request->hora,
            'estado'     => 'programada'
        ]);

        return response()->json($cita, 201);
    }

    // Listar las citas de un cliente
    public function indexPorCliente($clienteId)
    {
        $citas = Cita::where('cliente_id', $clienteId)->get();
        return response()->json($citas);
    }
}
