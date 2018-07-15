<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\President;

class PresidentController extends Controller
{
    //

    public function candidate(){

    	$candidate = Student::find(2);

    	$candidate->presidents;	

    	return $candidate;

    }


    public function process_contest($id){
    		$student_details = Student::find($id);

    		$data = array(
    			'id' => $student_details->id,
    			'level' => $student_details->level,
    			'programme'	=> $student_details->programme
    				);

    		$contest = New President();
    		$contest->students_id = $data['id'];
    		$contest->position = "president";
    		$contest->vote_count = 0;
    		$contest->save();

    		 return redirect()->route('home')->with('status', 'Contestant Added');



    }
}
