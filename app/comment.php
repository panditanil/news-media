<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
use App\news;
use App\category;

class comment extends Model
{
    protected $guarded = ['id'];

    public function cate(){
        return $this->hasMany(news::class,'category_id', 'id');
    }
    public function userss(){
        return $this->hasMany(news::class,'user_id', 'id');
    }

    public function newss(){
        return $this->hasMany(news::class,'news_id', 'id');
    }
    public function news(){
        return $this->belongsTo(news::class,'news_id', 'id');
    }
}
