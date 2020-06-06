<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['question_id','name'];

    public function businesses(){
        return $this->belongsToMany(Business::class);
    }

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d-M-Y');
    }
}
