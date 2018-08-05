<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\President;
use App\vote_count_president;
use App\Student_vote;
use Carbon\Carbon;

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
                'full_name' => $student_details->full_name
    				);

    		$contest = New President();
    		$contest->students_id = $data['id'];
            $contest->full_name = $data['full_name'];
    		$contest->position = "president";
    		$contest->vote_count = 0;
    		$contest->save();

    		 return redirect()->route('home')->with('status', 'Contestant Added');
    }


    public function process_vote(Request $request){

            $data = $request->all();
            
            //return $data;


            //process vote count president first
            //then process the student vote
            $vote_president = new vote_count_President();

            $vote_president->students_id = 1;   //get student id from the Auth function   
            $vote_president->students_fullname = 'Mubarak Aminu'; //also get this from Auth
            $vote_president->vote = 1;
            $vote_president->candidate_id = $data['candidate_id'];
            $vote_president->candidate_name = $data['candidate_name'];
            $vote_president->vote_time = Carbon::now();
            $vote_president->vote_status = 1;

            //if vote count is process successfull then
            if($vote_president->save()){

                //process the student count
                $student_vote = new student_vote();
                $student_vote->students_id = 1; //get from auth function
                $student_vote->candidate_id = $data['candidate_id'];
                $student_vote->candidate_name = $data['candidate_name'];
                $student_vote->position = 'President';

                $student_vote->save();

                return 'Good At this Point';


            }else{

                return 'Unauthorize Route';
            }

    }



}
