<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'tbadmin';
    protected $guarded = [];
    protected $hidden = ['token', 'password', 'username', 'role', 'created_at', 'updated_at'];
}
