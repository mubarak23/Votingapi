<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fin_sec extends Model
{
    //

    public function Student(){
    	
    		return $this->belongsTo('App\fin_sec');
    }

      public function Student_vote(){

    	return $this->belongsTo('App\Student_vote');

    }

    
}
