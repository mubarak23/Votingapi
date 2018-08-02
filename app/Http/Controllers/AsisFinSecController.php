<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\asis_fin_sec;

class AsisFinSecController extends Controller
{
    //

    public function process_contest($student_id){

    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id	
    			);

    	//process the student contest
    	$asis_fin_sec = new asis_fin_sec();
    	$asis_fin_sec->students_id = $data->id;
    	$asis_fin_sec->position = "Asis Fin Sec";
    	$asis_fin_sec->vote_count = 0;

    	if($asis_fin_sec->save()){

    		return redirect()->route('home')->with('status', 'Asis Fin Sec Added');

    	}else{

    		return redirect()->route('home')->with('status', 'Unable to Add');

    	}
    }
}
