<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    

    public function category(){
    	return $this->belongsToMany('App\post');
    }
}
