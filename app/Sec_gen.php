<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sec_gen extends Model
{
    //


    public function student(){

    	return $this->belongsTo('App\Student');

    }
}
