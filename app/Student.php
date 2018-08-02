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

    public function Social_dirs(){

            return $this->hasMany('App\Social_dirs', 'students_id', 'id');
    }

    public function Sport_dir(){
        
        return $this->hasMany('App\Sport_dir', 'students_id', 'id');

    }

    public function fin_sec(){
        return $this->hasMany('App\fin_sec', 'students_id', 'id');
        
    }

    public function asis_fin_sec(){
        return $this->hasMany('App\asis_fin_sec', 'students_id', 'id');
        
    }

    public function Pro_cand(){
        
        return $this->hasMany('App\Pro_cand', 'students_id', 'id');

    }

    public function Sale_cand(){

        return $this->hasMany('App\Sale_cand', 'students_id', 'id');

    }

    public function Academic_cand(){
        return $this->hasMany('App\Academic_cand', 'students_id', 'id');

    }



}
