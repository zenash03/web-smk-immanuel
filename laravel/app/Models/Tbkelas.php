<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbkelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getJumlahSiswaAttribute() {
        return User::where('kelas_id', $this->idkelas)->count();
    }
}
