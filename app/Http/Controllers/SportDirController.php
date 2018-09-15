<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sport_dir;
use Carbon\Carbon;
use App\Student_vote;
use App\vote_count_sport_dir;
use DB;


class SportDirController extends Controller
{
    //
     /**
   * @method process candidate
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */
    public function process_contest($student_id){

    		//find the student id first
    	$student = Student::find($student_id);

    	$data = array(
    		'id' => $student->id
    		);
        try{
            DB::beginTransaction();
            //process the new vote position
        $sport_dir = new Sport_dir();
        $sport_dir->id = $data['id'];
        $sport_dir->position = "Sport Director";
        $sport_dir->vote_count = 0;

        if($sport_dir->save()){
            $student->is_candidate = 1;
            $student->save();
            DB::commit();
            return redirect()->route('home')->with('status', 'Sport Director contestant Approve');

        }else{
            return redirect()->route('home')->with('status', 'Unable to process Contestant Request at the moment ! Try Again later');

        }    

        }catch(Exception $e){
            throw $e;
            DB::rollback();
        }

    	
    }

     /**
   * @method process vote
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return proceed to next voting position
   */
    public function process_vote(Request $request){
            $data = $request->all();

            try{

                $process_vote = new vote_count_sport_dir();
            $process_vote->students_id = 1; //get this from auth
            $process_vote->students_fullname = 'Mubarak Aminu'; //get from auth
            $process_vote->vote = 1;
            $process_vote->candidate_id = $data['candidate_id'];
            $process_vote->candidate_name = $data['candidate_name'];
            $process_vote->vote_time = Carbon::now();
            $process_vote->vote_status = 1;

            if($process_vote->save()){
                $student_vote = new Student_vote();
                $student_vote->students_id = 1;
                $student_vote->candidate_id = $data['candidate_id'];
                $student_vote->candidate_name = $data['candidate_name'];
                $student_vote->position = "Vice President";
                $student_vote->save();
                $candidate_vote = Sport_dir::where('id', $data['candidate_id'])->select('vote_count')->first();
                $vote_count = $candidate_vote->vote_count;
                $candidate_vote->vote_count = $vote_count + 1;
                $candidate_vote->save();
                DB::commit();
                return redirect()->route('vote/show_pro');

            }else{
                return back()->withInput()->with('status', 'Unable to process Your vote at this time');
            }
            }catch(Exception $e){

                throw $e;
                DB::rollback();

            }
    }
}
