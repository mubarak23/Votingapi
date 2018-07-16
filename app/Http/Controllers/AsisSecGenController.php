<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asis_Sec_gen;
use App\Student;

class AsisSecGenController extends Controller
{
    //


    public function process_contest($student_id){

    		//find the student that want to contest
    	$student = Student::find($student_id);

    		$data = array(
    			'id'	=> $student->id
    			);

    	//add student that will contest for the postion in the required poation
    		$asis_sec_gen = new Asis_Sec_gen();

    		$asis_sec_gen->students_id = $data['id'];
    		$asis_sec_gen->position = "Sec General";
            $asis_sec_gen->vote_count = 0;

    		if( $asis_sec_gen->save() ){

    			return redirect()->route('home')->with('status', 'Asis Sec Gen has Been Added');

    		}else{

    			 return redirect()->route('home')->with('status', 'Unable to Add Contestant');	
    		}

    			

    }


}
