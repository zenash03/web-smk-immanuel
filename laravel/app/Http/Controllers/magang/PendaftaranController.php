<?php

namespace App\Http\Controllers\magang;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\PendaftarMagang;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return PendaftarMagang::with('magang')->get();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        $username = User::where('token', $request->token)->first()->username;
        
        return PendaftarMagang::with(['magang', 'penyetuju'])->where('username', $username)->first();
    }

    public function update(Request $request, PendaftarMagang $pendaftaran)
    {
        $user = Admin::where('token', $request->token)->first();

        if (!$user) return response()->json(['message' => 'Unauthorized'], 401);

        $pendaftaran->update([
            'disetujui' => $request->state,
            'penyetuju_id' => $user->id,
            'tanggal_disetujui' => date('d F Y')
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    public function destroy($id)
    {
        //
    }
}
