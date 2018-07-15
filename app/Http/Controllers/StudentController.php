<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\President;
use App\Student;


class StudentController extends Controller
{
    //

     public function allcandidate(){

    	$candidate = President::find(1);

    	$candidate->students;

    	/*$candidate = $candidate->each(function ($candidate, $key) {
  		  		$candidate->student;
		});
*/

    	

    	return $candidate;

    }
}
