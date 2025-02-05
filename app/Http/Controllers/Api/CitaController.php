<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $query = Cita::query();

        // Si se envía el parámetro 'estado', filtra por él.
        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        $citas = $query->get();

        return response()->json($citas);
    }

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
