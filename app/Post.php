<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{

    protected $fillable = [
        'title', 'description', 'post_type', 'max_stud','date_begin',"date_end","price","category_id","status"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function picture()
    {
        return $this->hasOne(Picture::class);
    }

    // date_begin 
    public function getDateBeginAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDateEndAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeFuturFormationStage($query){
        $now = Carbon::now();

        return $query->where('date_begin', '>', $now)->orderBy('date_begin', 'ASC');
    }
}
