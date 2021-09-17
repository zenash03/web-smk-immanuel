<?php

namespace App\Http\Controllers\magang;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\FormMagang;
use App\Models\PendaftarMagang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    public function index()
    {
        return PendaftarMagang::with('magang')->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pendaftar' => 'required'
        ]);
        
        if ($validator->fails()) return response()->json(['message' => 'Mohon isi setidaknya 1 nama siswa'], 422);
        
        $user = User::where('username', $request->pendaftar)->first();
        $magang = FormMagang::find($request->id);

        $terdaftar = PendaftarMagang::where('user_id', $user->id)->first();

        if ($magang->slot_tersedia == 0) return response()->json(['message' => 'Kouta sudah habis 🤣']);
        if ($terdaftar && $terdaftar->disetujui != 'n') return response()->json(['message' => 'Kamu sudah terdaftar di tempat lain 🙃'], 422);

        $magang->update(['slot_tersedia' => $magang->slot_tersedia - 1]);

        PendaftarMagang::create([
            'user_id' => $user->id,
            'magang_id' => $magang->id,
            'nama' => $user->name,
            'username' => $user->username
        ]);

        return response()->json(['message' => 'Yay, Pendaftaran berhasil 🥳'], 200);
    }

    public function show(Request $request, $id)
    {
        $username = User::where('token', $request->token)->first()->username;
        
        return PendaftarMagang::with(['magang', 'penyetuju'])->orderByDesc('created_at')->where('username', $username)->get();
    }

    public function update(Request $request, PendaftarMagang $pendaftaran)
    {
        $user = Admin::where('token', $request->token)->first();

        if (!$user) return response()->json(['message' => 'Unauthorized'], 401);

        if ($request->state == 'n') {
            $magang = FormMagang::find($pendaftaran->magang_id);

            $magang->update(['slot_tersedia' => $magang->slot_tersedia + 1]);
        }

        if ($pendaftaran->disetujui == 'n' && $request->state == 'y') {
            $magang = FormMagang::find($pendaftaran->magang_id);

            $magang->update(['slot_tersedia' => $magang->slot_tersedia - 1]);
        }

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
