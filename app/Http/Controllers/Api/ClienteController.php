<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Listado de clientes
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    // Ingresar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email'    => 'required|email|unique:clientes'
        ]);

        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    // Mostrar un cliente en particular (opcional)
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente);
    }

    public function citas($id)
{
    $cliente = Cliente::findOrFail($id);
    return response()->json($cliente->citas); // Asumiendo que tienes la relación definida en el modelo
}

}
