<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'tbuser';
    protected $guarded = [];
    protected $hidden = ['token', 'password', 'role', 'created_at', 'updated_at'];
    protected $appends = ['kelas'];

    public function getKelasAttribute()
    {
        return Tbkelas::where('idkelas', $this->kelas_id)->first()->nama_kelas;
    }
}
