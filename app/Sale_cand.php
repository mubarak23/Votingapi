<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_cand extends Model
{

    //

	public function Student(){
		return $this->belongsTo('App\Student');
	}
}
