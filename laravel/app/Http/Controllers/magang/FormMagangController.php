<?php

namespace App\Http\Controllers\magang;

use App\Http\Controllers\Controller;
use App\Models\FormMagang;
use App\Models\PendaftarMagang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormMagangController extends Controller
{
    public function index()
    {
        $data = FormMagang::orderByDesc ('slot_tersedia')->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'kouta' => 'required||numeric|min:1|max:4',
            'alamat' => 'required',
            'telp' => 'required',
            'pic' => 'required'
        ]);

        if ($validator->fails()) return response()->json(['message' => 'Invalid Field'], 422);

        $magang = FormMagang::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'kouta' => $request->kouta,
            'slot_tersedia' => $request->kouta,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'pic' => $request->pic,
            'keterangan' => $request->keterangan
        ]);

        if ($request->pendaftar) {
            $magang->update(['slot_tersedia' => $magang->kouta - count($request->pendaftar)]);

            foreach ($request->pendaftar as $pendaftar) {
                $user = User::where('username', $pendaftar)->first();

                PendaftarMagang::create([
                    'user_id' => $user->id,
                    'magang_id' => $magang->id,
                    'nama' => $user->name,
                    'username' => $user->username
                ]);
            }
        }

        return response()->json(['message' => 'Pendaftaran Sukses'], 200);
    }

    public function show(FormMagang $magang)
    {
        return response()->json($magang, 200);
    }

    public function update(Request $request, FormMagang $magang)
    {
        $validator = Validator::make($request->all(), [
            'pendaftar' => 'required'
        ]);

        if ($validator->fails()) return response()->json(['message' => 'Mohon isi setidaknya 1 nama siswa'], 422);

        $magang->update(['slot_tersedia' => $magang->slot_tersedia - count($request->pendaftar)]);

        foreach ($request->pendaftar as $pendaftar) {
            $user = User::where('username', $pendaftar)->first();

            PendaftarMagang::create([
                'user_id' => $user->id,
                'magang_id' => $magang->id,
                'nama' => $user->name,
                'username' => $user->username
            ]);
        }

        return response()->json(['message' => 'Pendaftaran Success'], 200);
    }

    public function destroy($id)
    {
        //
    }
}
