<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMagang extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['creator_name'];

    public function getCreatorNameAttribute() {
        return User::find($this->created_by)->name;
    }
}
