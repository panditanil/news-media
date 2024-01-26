<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\comment;
use App\category;

class news extends Model
{
    protected $table = 'newstable';
    protected $guarded = ['id'];

    public function comments(){
        return $this->hasMany(comment::class);
    }
    public function category(){
        return $this->hasOne(category::class,'id','category_id');
    }
    public function users()
{
    return $this->belongsTo(user::class);
}
}
