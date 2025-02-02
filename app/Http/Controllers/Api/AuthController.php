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
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Usuario::where('username', $credentials['username'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        // Si usas Sanctum, por ejemplo:
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
    // Cerrar sesión (revocar token)
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Token eliminado']);
    }
}
