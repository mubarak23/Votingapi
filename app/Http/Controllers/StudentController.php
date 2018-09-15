<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\President;
use App\Student;
use DB;


class StudentController extends Controller
{
   
    public function add_student(){

        return view('admin.add-student');

    }

/**
   * @method add student
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */
    public function add(Request $request){
              
             $data = $request->all(); 
            //set validation rules
      $validatedData = $request->validate([
            "full_name" => "required",
            "reg_no" => "required",
            "reg_no"   => "required",
            "level"    => "required"   
            ]);

          try{
            DB::beginTreansaction();
             $add_student = new Student();
             $add_student->full_name = $data['full_name'];
             $add_student->level = $data['level'];
             $add_student->programme = $data['programme'];
             $add_student->reg_no = $data['reg_no'];
             $add_student->is_candidate = 0;

             if($add_student->save()){
               DB::commit();
              return redirect()->route('home')->with('status', 'Student Added');

             }else{
              return back()->withInput()->with('status', 'Unable to Add Student At this time');

             }
           

          }catch(Exception $e){
              throw $e;
              DB::rollback();

          }

    }



    public function student_details($student_id){
      //pull student details and send to a singlr form
      $student_details = Student::find($student_id);

      return view('student.details')->with('student', $student_details);


    }
}
