<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\fin_sec;

class FinSecController extends Controller
{
    //


    public function process_contest($student_id){
    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id' => $student->id
    		);

    	//process the position
    	$fin_sec = new fin_sec();
    	$fin_sec->id = $data['id'];
    	$fin_sec->position = 'fin_sec';
    	$fin_sec->vote_count = '0';

    	if($fin_sec->save()){

    			return redirect()->route('home')->with('status','Fin Sec');
    	}else{

    		return redirect()->route('home')->with('status', 'Unable to add Fin Sec');
    	}

    }
}
