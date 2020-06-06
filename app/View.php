<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['business_id','ip_address'];

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
