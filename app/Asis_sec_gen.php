<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asis_sec_gen extends Model
{
    //


    public function Student(){

    	return $this->belongsTo('App\Student');

    }


    public function Student_vote(){

    	return $this->belongsTo('App\Student_vote');

    }
}
