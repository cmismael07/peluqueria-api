<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:usuarios',
            'password' => 'required|string|min:6'
        ]);

        $usuario = Usuario::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($usuario, 201);
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $usuario = Usuario::where('username', $request->username)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        // Crear token de acceso
        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    // Cerrar sesión (revocar token)
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Token eliminado']);
    }
}
