<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport_dir extends Model
{
    //

    public function Student(){
    	
    	return $this->belongsTo('App\Sport_dir');
    }


    public function Student_vote(){

    	return $this->belongsTo('App\Student_vote');

    }


}
