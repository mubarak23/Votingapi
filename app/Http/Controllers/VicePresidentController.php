<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Vice_president;

class VicePresidentController extends Controller
{
    //


    public function process_contest($id){
    	$student_detail = Student::find($id);

    	$data = array(
    	  'id'	=> $student_detail->id,
    	  'level' => $student_detail->level,
    	  'programme' => $student_detail->programme	
    		);

    	$contest = new Vice_president();

    	$contest->student_id = $data['id'];
    	$contest->position = 'Vice President';
    	$contest->vote_count = 0;

    	$contest->save();

    	return redirect()->route('home')->witn('status', 'Vice President Contestant Added');
    	

    }
}
