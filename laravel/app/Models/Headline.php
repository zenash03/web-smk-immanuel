<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['excerpt'];

    public function getExcerptAttribute()
    {
        $content = Headline::where('id', $this->id)->first()->content;

        return substr($content, 0, 300) . '...';
    }
}
