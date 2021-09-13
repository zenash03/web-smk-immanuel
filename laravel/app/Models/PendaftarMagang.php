<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarMagang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function magang() {
        return $this->belongsTo(FormMagang::class, 'magang_id');
    }
}
