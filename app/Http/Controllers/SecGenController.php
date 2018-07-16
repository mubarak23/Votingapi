<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sec_gen;



class SecGenController extends Controller
{
    //


    public function contest_sec_gens($student_id){
    	//find the student detaild from student model
    	$student = Student::find($student_id);

    	//add all the student details to data array

    	$data = array(
    		'id'	=> $student->id,
    		'level'	=> $student->level,
    		'programme'	=> $student->programme	
    			);

    	//add the student to the sec gen model

    		$sec_gen = new Sec_gen();

    		$sec_gen->students_id = $data['id'];
    		$sec_gen->position = "Sec General";
            $sec_gen->vote_count = 0;

            if($sec_gen->save()){

                return redirect()->route('home')->with('status', 'Contestant Added');

            }else{

                   return redirect()->route('home')->with('status', 'Unable to Add Contestant');


            }
    }


}
