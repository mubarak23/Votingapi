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

    public function Sec_gen(){

    		return $this->hasMany('App\Sec_gen', 'students_id', 'id');

    }

    public function Asis_sec_gen(){

    	return $this->hasMany('App\Asis_sec_gen', 'students_id', 'id');

    }



}
