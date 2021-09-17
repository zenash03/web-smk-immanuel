<?php

namespace App\Http\Controllers\magang;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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

    public function storeAdmin(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'kouta' => 'required|numeric|min:1|max:4',
            'alamat' => 'required',
            'telp' => 'required',
            'pic' => 'required'
        ]);
        
        if ($validator->fails()) return response()->json(['message' => 'Data yang kamu masukin ga valid 😜. coba cek lagi deh'], 422);
        $user = Admin::where('token', $request->token)->first();

        $magang = FormMagang::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'kouta' => $request->kouta,
            'slot_tersedia' => $request->kouta,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'pic' => $request->pic,
            'keterangan' => $request->keterangan,
            'tanggal_didaftarkan' => date('d F Y'),
            'created_by' => $user->id,
            'creator_role' => 'admin'
        ]);

        if ($request->pendaftar) {
            $magang->update(['slot_tersedia' => $magang->kouta - count($request->pendaftar)]);

            foreach ($request->pendaftar as $pendaftar) {
                $candidate = User::where('username', $pendaftar)->first();
                $already = PendaftarMagang::where('user_id', $candidate->id)->first();
                
                if ($already) {
                    $this->destroy($magang->id);

                    return response()->json(['message' => "$candidate->name sudah pernah terdaftar. Pendaftaran gagal"], 422);
                }

                $pendaftar = ($user->id == $candidate->id) ? null : $user->name; 

                PendaftarMagang::create([
                    'user_id' => $candidate->id,
                    'magang_id' => $magang->id,
                    'nama' => $candidate->name,
                    'username' => $candidate->username,
                    'didaftarkan_oleh' => $pendaftar
                ]);
            }
        }

        return response()->json(['message' => 'Pendaftaran Sukses'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'kouta' => 'required|numeric|min:1|max:4',
            'alamat' => 'required',
            'telp' => 'required',
            'pic' => 'required'
        ]);
        
        if ($validator->fails()) return response()->json(['message' => 'Data yang kamu masukin ga valid 😜. coba cek lagi deh'], 422);
        $user = User::where('token', $request->token)->first();

        $magang = FormMagang::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'kouta' => $request->kouta,
            'slot_tersedia' => $request->kouta,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'pic' => $request->pic,
            'keterangan' => $request->keterangan,
            'tanggal_didaftarkan' => date('d F Y'),
            'created_by' => $user->id,
            'creator_role' => 'siswa'
        ]);

        if ($request->pendaftar) {
            $magang->update(['slot_tersedia' => $magang->kouta - count($request->pendaftar)]);

            foreach ($request->pendaftar as $pendaftar) {
                $candidate = User::where('username', $pendaftar)->first();
                $already = PendaftarMagang::where('user_id', $candidate->id)->first();
                
                if ($already) {
                    $this->destroy($magang->id);

                    return response()->json(['message' => "$candidate->name sudah pernah terdaftar 😡. Pendaftaran gagal 🤪"], 422);
                }

                $pendaftar = ($user->id == $candidate->id) ? null : $user->name; 

                PendaftarMagang::create([
                    'user_id' => $candidate->id,
                    'magang_id' => $magang->id,
                    'nama' => $candidate->name,
                    'username' => $candidate->username,
                    'didaftarkan_oleh' => $pendaftar
                ]);
            }
        }

        return response()->json(['message' => 'Pendaftaran Sukses'], 200);
    }

    public function show(FormMagang $magang)
    {
        return response()->json($magang, 200);
    }

    public function update(Request $request)
    {
        
    }

    public function destroy($id)
    {
        PendaftarMagang::where('magang_id', $id)->delete();
        FormMagang::find($id)->delete();

        return response()->json(['message' => 'Delete Success'], 200);
    }
}
