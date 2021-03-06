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

    public function getDateBeginAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getDateEndAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function scopeFuturFormationStage($query){
        $now = Carbon::now();

        return $query->where('date_begin', '>', $now)->orderBy('date_begin', 'ASC');
    }
    public function scopeOrderByCreatedAt($query){
         return $query->orderBy('created_at', 'DESC');
    }
    public function scopePublished($query){
        return $query->where('status', 'published');
    }
    public function scopeArchived($query){
        return $query->where('status', 'archived');
    }
    public function scopeNotArchived($query){
        return $query->where('status', '!=', 'archived');
    }
}
