<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarMagang extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['kelas'];

    public function getKelasAttribute() {
        return Tbkelas::where('idkelas', $this->kelas_id)->first()->nama_kelas;
    }

    public function penyetuju() {
        return $this->belongsTo(Admin::class, 'penyetuju_id');
    }

    public function magang() {
        return $this->belongsTo(FormMagang::class, 'magang_id');
    }
}
