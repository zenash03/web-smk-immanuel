<?php

namespace App\Http\Controllers\magang;

use App\Http\Controllers\Controller;
use App\Models\PendaftarMagang;
use App\Models\Tbkelas;
use App\Models\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        $result = [];
        $classes = Tbkelas::where('tingkat', 12)->get();
        
        foreach ($classes as $class) {
            $class['jumlah_siswa'] = $class->jumlah_siswa;
            $class['jumlah_pendaftar'] = PendaftarMagang::where('kelas_id', $class->idkelas)->count();

            $newData = [
                'name' => $class->nama_kelas,
                'jumlah_siswa' => $class->jumlah_siswa,
                'jumlah_pendaftar' => $class->jumlah_pendaftar
            ];

            array_push($result, $newData);
        }

        $registered = [
            'name' => 'Semua Kelas',
            'jumlah_siswa' => User::where('tingkat', 12)->count(),
            'jumlah_pendaftar' => PendaftarMagang::groupBy('user_id')->selectRaw('count(*) as total, user_id')->get()->count()
        ];

        array_push($result, $registered);

        return $result;
    }
}
