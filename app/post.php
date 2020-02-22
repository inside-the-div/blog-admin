<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    




	public function category(){
		return $this->belongsToMany('App\category');
	}

    public function user()
    {
        return $this->belongsTo('App\User', 'add_by');
    }
}
