<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\fin_sec;
use App\Student_vote;
use App\vote_count_fin_sec;
use Carbon\Carbon;
use DB;

class FinSecController extends Controller
{
    //
    /**
   * @method process contest
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */

    public function process_contest($student_id){
    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id' => $student->id
    		);

    	//process the position
        try{
            DB::beginTransaction();

        $fin_sec = new fin_sec();
        $fin_sec->id = $data['id'];
        $fin_sec->position = 'fin_sec';
        $fin_sec->vote_count = '0';
        if($fin_sec->save()){
            $student->is_candidate = 1;
            $student->save();
             DB::commit();
                return redirect()->route('home')->with('status','Fin Sec');
        }else{
            return redirect()->route('home')->with('status', 'Unable to add Fin Sec');
        }

        }catch(Exeception $e){
            throw $e;

        }
    	

    }

    /**
   * @method process vote
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return next voting position
   */
    public function process_vote(Request $request){

        $data = $request->all();

        try{
            DB::beginTransaction();

             $process_vote = new vote_count_fin_sec();
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
                //increate the count in the candidate table
                    $candidate_count = fin_sec::where('id', $data['candidate_id'])->select('vote_count')->first();
                    $candidate_count->vote_count = $candidate_count->vote_count + 1;
                    $candidate_count->save();
                    DB::commit();
                return redirect()->route('vote/show_asist_fin_sec');

            }else{
                return back()->withInput()->with('status', 'Unable to process Your vote at this time');
            }


        }catch(Exeception $e){
            throw $e;
            DB::rollback();
        }

    }
}
