<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro_cand extends Model
{
    //

    public function Student(){
    	return $this->belongsTo('App\Student')
    }


      public function Student_vote(){

    	return $this->belongsTo('App\Student_vote');

    }

    
}
