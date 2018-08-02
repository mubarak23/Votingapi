<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SportDirController extends Controller
{
    //

    public function process_contest($student_id){

    		//find the student id first
    	$student = Student::find($student_id);

    	$data = array(
    		'id' => $student->id
    		);

    	//process the new vote position
    	$sport_dir = new Sport_dir();
    	$sport_dir->id = $data['id'];
    	$sport_dir->position = "Sport Director";
    	$sport_dir->vote_count = 0;

    	if($sport_dir->save()){
    		return redirect()->route('home')->with('status', 'Sport Director contestant Approve');

    	}else{
    		return redirect()->route('home')->with('status', 'Unable to process Contestant Request at the moment ! Try Again later');

    	}
    }
}
