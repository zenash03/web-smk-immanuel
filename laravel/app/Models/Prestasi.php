<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['excerpt'];

    public function getExcerptAttribute()
    {
        $content = Prestasi::where('id', $this->id)->first()->content;

        return substr($content, 0, rand(90, 130)) . '...';
    }
}
