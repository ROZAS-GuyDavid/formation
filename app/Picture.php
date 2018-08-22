<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
