<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['question_id','city','state','country'];

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
