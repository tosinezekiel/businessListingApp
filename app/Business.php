<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Business extends Model
{
    protected $fillable = ['name','description','phone','url','email','status','views'];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function increaseViews(){
        $this->views += 1 ;
    }

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d-M-Y');
    }
}
