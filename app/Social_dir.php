<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social_dir extends Model
{
    //

    public function Student(){

    	return $this->belongsTo('App\Social_dir');
    }


      public function Student_vote(){

    	return $this->belongsTo('App\Student_vote');

    }
}
