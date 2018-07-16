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


    public function add_student(){

        return view('student.add');

    }


    public function add(Request $request){
          
          if($request->isMethod('post')){

              //set validation rules
            $this->validate($request, [
                'full_name' => 'required|min:5',
                'reg_no'    => 'required',
                'programme' => 'required',
                'level'     => 'required'
                ]);


            $data = $request->all();

            //calling the new student model
            $add_student = new Student();
            $add_student->full_name = $data['full_name'];
            $add_student->reg_no = $data['reg_no'];
            $add_student->programme = $data['programme'];
            $add_student->level = $data['level'];
            $add_student->is_candidate = 0;

            if($add_student->save()){
              //back to admin home page with success message

              return redirect()->route('home')->with('status', 'Student Added');


            }else{

                return view('student.add');

            }

          }else{

            return view('student.add');
          }

        



    }



    public function student_details($student_id){
      //pull student details and send to a singlr form
      $student_details = Student::find($student_id);

      return view('student.details')->with('student', $student_details);


    }
}
