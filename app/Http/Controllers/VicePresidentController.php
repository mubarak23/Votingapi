<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Vice_president;
use App\vote_count_vice_president;
use App\Student_vote;
use Carbon\Carbon;
use DB;

class VicePresidentController extends Controller
{
    //

     /**
   * @method process candidate
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */
    public function process_contest($id){
    	$student_detail = Student::find($id);

    	$data = array(
    	  'id'	=> $student_detail->id,
    	  'level' => $student_detail->level,
    	  'programme' => $student_detail->programme	
    		);
        try{
            DB::beginTransaction();
            
            $contest = new Vice_president();

        $contest->students_id = $data['id'];
        $contest->position = 'Vice President';
        $contest->vote_count = 0;

        if($contest->save()){
            $student->is_candidate = 1;
            $student->save();
            DB::commit();
            return redirect()->route('home')->with('status', 'Contestant Added');
        }else{
            return back()->withInput()->with('status', 'Unabled to Added Contestant');
        }                 

        }catch(Exeception $e){
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
            //process the vote cast

            try{
                DB::beginTransaction();
            $vp_vote = new vote_count_vice_president();
            $vp_vote->students_id = 1; //get this from auth
            $vp_vote->students_fullname = 'Mubarak Aminu'; //get from auth
            $vp_vote->vote = 1;
            $vp_vote->candidate_id = $data['candidate_id'];
            $vp_vote->candidate_name = $data['candidate_name'];
            $vp_vote->vote_time = Carbon::now();
            $vp_vote->vote_status = 1;

            if($vp_vote->save()){

                //process student vote
                $student_vote = new Student_vote();
                $student_vote->students_id = 1;
                $student_vote->candidate_id = $data['candidate_id'];
                $student_vote->candidate_name = $data['candidate_name'];
                $student_vote->position = "Vice President";
                $student_vote->save();
                $candidate_vote = Vice_president::where('id', $data['candidate_id'])->select('vote_count')->first();
                $vote_count = $candidate_vote->vote_count;
                $candidate_vote->vote_count = $vote_count + 1;
                $candidate_vote->save();
                DB::commit();
                return redirect()->route('vote/show_sec');

            }else{
                return back()->withInput()->with('status', 'Unabled to process Your Vote At this time');
            }

            }catch(Exeception $e){
                throw $e;
                DB::rollback();
            }
            
    }

}
