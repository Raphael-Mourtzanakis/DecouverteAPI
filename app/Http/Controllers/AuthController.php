<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request) {
        if (!$request->isJson()) {
            return response()->json(['error' => 'Requête JSON attendue'], 401);
        }

        // authentification email/password
        $email = $request->json('email');
        $mdp = $request->json('password');
        $identifiants = ['email' => $email, 'password' => $mdp];

        if (!Auth::attempt($identifiants)) {
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        }

        // création token et retour informations
        $user = $request->user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name
            ]
        ]);
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'message' => "Utilisateur {$user->name} déconnecté"
        ]);
    }

}
