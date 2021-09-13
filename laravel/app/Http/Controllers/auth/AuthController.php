<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only(['username', 'password']);

        if ($validator->fails() || !Auth::attempt($credential)) {
            return response()->json(['message' => 'Login Gagal 😜'], 422);
        }

        $user = User::where('username', $request->username)->first();
        $token = bcrypt($user->id);

        $user->update([
            'token' => $token
        ]);

        return response()->json($token, 200);
    }

    public function logout(Request $request) {
        if (!$request->token) return response()->json(['message' => 'Kamu belum login 😠'], 401);
        
        $user = User::where('token', $request->token)->first();
        if (!$user) return response()->json(['message' => 'Kamu belum login 😠'], 401);
        
        $user->update(['token' => null]);
        
        return response()->json(['message' => 'Logged Out'], 401);
    }
    
    public function me(Request $request) {
        if (!$request->token) return response()->json(['message' => 'Kamu belum login 😠'], 401);
        
        $user = User::where('token', $request->token)->first();
        if (!$user) return response()->json(['message' => 'Kamu belum login 😠'], 401);

        return response()->json($user, 200);
    }

    public function siswa(Request $request) {
        $siswa = User::where('role', 'siswa')->join('pendaftar_magangs', 'pendaftar_magangs.user_id', '!=', 'users.id')->get();

        return response()->json($siswa, 200);
    }
}
