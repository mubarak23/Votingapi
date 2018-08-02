<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic_cand;
use App\Student;

class AcademicCandController extends Controller
{
    //

	public function process_contest($student_id){

    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id	
    			);

    	//process the student contest
    	$academic_cand = new Academic_cand();
    	$academic_cand->students_id = $data->id;
    	$academic_cand->position = "Academic Director";
    	$academic_cand->vote_count = 0;

    	if($academic_cand->save()){

    		return redirect()->route('home')->with('status', 'Sales Director Added');

    	}else{

    		return redirect()->route('home')->with('status', 'Unable to Add Sale Director');

    	}
    }

}
