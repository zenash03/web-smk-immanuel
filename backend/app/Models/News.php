<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['image'];

    public function getImageAttribute() {
        if (app()->isLocal()) {
            return url('/') . '/storage/' . $this->image_url;
        } else {
            return url('/') . '/api/storage/' . $this->image_url;
        }
    }
}
