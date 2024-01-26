<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\news;
class category extends Model
{
    protected $guarded = ['id'];

    public function newss(){
        return $this->hasMany(news::class,'category_id', 'id')->where('status',1);
    }
}
