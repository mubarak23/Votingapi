<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Social_dir;

class social_dirController extends Controller
{
    //

    public function process_contest($student_id){

    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id
    		);

    	$Social_dir = new Social_dir();
    	$Social_dir->id = $data['id'];
    	$Social_dir->position = 'Social Director';
    	$Social_dir->vote_count = 0;

    	if($Social_dir->save()){
    	return redirect()->route('home')->with('status', 'Social Director Position Added');	

    	}else{

    		return redirect()->route('home')->with('status', 'Unable to process your contest Application at the moment');
    	}


    }
}
