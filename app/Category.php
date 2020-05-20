<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['question_id','name'];

    public function businesses(){
        return $this->belongsToMany(Business::class);
    }
}
