<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// table categories sql
class Category extends Model
{
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
