<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\President;

class student extends Model
{
    //

    public function president(){
    		return $this->hasMany('App\President', 'students_id', 'id');

    }


    public function vice_president(){

    	return $this->hasMany('App\Vice_predient', 'students_id', 'id');

    }
}
