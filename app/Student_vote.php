<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_vote extends Model
{
    //

    public function Academic_cabd(){

    	return $this->hasMany('App\Academic_cand');

    }


    public function asis_fin_sec(){

    	return $this->hasMany('app\asis_fin_sec');

    }


    public function Asis_sec_gen(){

    	return $this->hasMany('App\Asis_sec_gen');

    }


    public function fin_sec(){

    	return $this->hasMany('App\fin_sec');

    }


    public function President(){

    	return $this->hasMany('App\President');

    }


   public function Pro_cand(){

   		return $this->hasMany('App\Pro_cand');

   } 


   public function Sale_cand(){

   		return $this->hasMany('App\Sale_cand');

   }


   public function Sec_gen(){

   		return $this->hasMany('App\Sec_gen');

   }


   public function Social_dir(){

   		return $this->hasMany('App\Social_dir');

   }



   public function Sport_dir(){

   		return $this->hasMany('App\Sport_dir');

   }


   public function Vice_president(){

   		return $this->hasMany('App\Vice_president');

   }


}
