<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['business_id','review','rating'];

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
