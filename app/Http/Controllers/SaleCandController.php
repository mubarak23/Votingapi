<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sale_cand;

class SaleCandController extends Controller
{
    //

	public function process_contest($student_id){

    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id	
    			);

    	//process the student contest
    	$sale_cand = new Sale_cand();
    	$sale_cand->students_id = $data->id;
    	$sale_cand->position = "Sale Director";
    	$sale_cand->vote_count = 0;

    	if($sale_cand->save()){

    		return redirect()->route('home')->with('status', 'Sales Director Added');

    	}else{

    		return redirect()->route('home')->with('status', 'Unable to Add Sale Director');

    	}
    }


}
