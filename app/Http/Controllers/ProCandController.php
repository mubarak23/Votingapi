<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pro_cand;
use App\Student;

class ProCandController extends Controller
{
    //
	public function process_contest($student_id){

    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id	
    			);

    	//process the student contest
    	$pro_cand = new Pro_cand();
    	$pro_cand->students_id = $data->id;
    	$pro_cand->position = "PRO";
    	$pro_cand->vote_count = 0;

    	if($pro_cand->save()){

    		return redirect()->route('home')->with('status', 'PRO Candidate Added');

    	}else{

    		return redirect()->route('home')->with('status', 'Unable to Pro Candidate');

    	}
    }

}
