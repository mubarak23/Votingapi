<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;


class President extends Model
{
    //

    public function students(){
    		return $this->belongsTo('App\Student');

    }


   public function Student_vote(){

    	return $this->belongsTo('App\Student_vote');

    }


    


}
