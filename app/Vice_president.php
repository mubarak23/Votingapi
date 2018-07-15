<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vice_president extends Model
{
    //

    public function students(){

    	return $this->belongsTo('App\Student');

    }
}
