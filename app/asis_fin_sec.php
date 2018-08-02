<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asis_fin_sec extends Model
{
    //

    public function student(){

    	return $this->belongsTo('app\asis_fin_sec');
    	
    }
}
