<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $user = Admin::where('username', $username)->first();

        if ($validator->fails() || !$user || !password_verify($request->password, $user->password)) {
            return response()->json(['message' => 'Username atau Password Salah'], 422);
        }

        $token = bcrypt($user->id);
        
        $user->update(['token' => $token]);

        return response()->json($token, 200);
    }

    public function logout(Request $request) {
        if (!$request->token) return response()->json(['message' => 'Kamu belum login'], 401);
        
        $user = Admin::where('token', $request->token)->first();
        if (!$user) return response()->json(['message' => 'Kamu belum login'], 401);
        
        $user->update(['token' => null]);
        
        return response()->json(['message' => 'Logged Out'], 200);
    }

    public function me(Request $request) {
        if (!$request->token) return response()->json(['message' => 'Kamu belum login'], 401);
        
        $user = Admin::where('token', $request->token)->first();
        if (!$user) return response()->json(['message' => 'Kamu belum login'], 401);

        return response()->json($user, 200);
    }
}
