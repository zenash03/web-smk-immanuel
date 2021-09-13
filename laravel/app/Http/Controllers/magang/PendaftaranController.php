<?php

namespace App\Http\Controllers\magang;

use App\Http\Controllers\Controller;
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
        
        return PendaftarMagang::with('magang')->where('username', $username)->first();
    }

    public function update(Request $request, PendaftarMagang $pendaftaran)
    {
        $user = User::where('token', $request->token)->first();

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
