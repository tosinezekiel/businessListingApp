<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['question_id','path'];

    public function business(){
        return $this->belongsToMany(Business::class);
    }
}
