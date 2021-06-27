<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private function storeSuccessfulToken() {
        session('token') = $user->createToken('Web')->plainTextToken;

        $request->session()->flash('message', "Vous vous êtes authentifié avec succès.");
        return redirect()->route('account');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('message', "Vous devez spécifier un email valide et un mot de passe pour vous connecter.");
            return redirect()->route('login');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user && Hash::check($user->password, $request->password)) {
            $request->session()->flash('message', "Mot de passe non valide.");
            return redirect()->route('login');
        }

        if ($user->hasToken()) {
            $user->tokens()->delete();  
        }

        $this->storeSuccessfulToken();
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        Session::forget('token');

        return response()->json(null, 204);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->first()
            ], 422);
        }

        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'errors' => 'This email is already linked to an account.'
            ], 409);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);

        $this->storeSuccessfulToken();
    }

    public function getUserData(Request $request)
    {
        return response()->json([
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'created_at' => $request->user()->created_at,
            'updated_at' => $request->user()->updated_at
        ], 200);
    }
}