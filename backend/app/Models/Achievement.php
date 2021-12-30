<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $appends = ['excerpt', 'image'];

    public function getImageAttribute() {
        if (app()->isLocal()) {
            return url('/') . '/storage/' . $this->image_url;
        } else {
            return url('/') . '/api/storage/' . $this->image_url;
        }
    }

    public function getExcerptAttribute()
    {
        return substr($this->content, 0, rand(90, 130)) . '...';
    }
}
