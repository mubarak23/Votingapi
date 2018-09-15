<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treasurer;
use Carbon\Carbon;
use App\Student_vote;
use App\vote_count_treasurer;
use DB;

class TreasurerController extends Controller
{
    //
     /**
   * @method process candidate
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return  status
   */
    public function process_contest($student_id){
    		$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id	
    			);
    	try{
    	DB::beginTransaction();
    	$treasurer_cand = new Treasurer();
        $treasurer_cand->students_id = $data->id;
        $treasurer_cand->position = "Treasurer Director";
        $treasurer_cand->vote_count = 0;

        if($sale_cand->save()){
              $student->is_candidate = 1;
              $student->save();
              DB::commit(); 
            return redirect()->route('home')->with('status', 'Treasurer Director Added');
        }else{

            return redirect()->route('home')->with('status', 'Unable to Add Treasurer');
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

    		try{

    		DB::beginTransaction();
    		$process_vote = new vote_count_treasurer();
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
                $candidate_vote = Treasurer::where('id', $data['candidate_id'])->select('vote_count')->first();
                $vote_count = $candidate_vote->vote_count;
                $candidate_vote->vote_count = $vote_count + 1;
                $candidate_vote->save();
                DB::commit();
                return redirect()->route('vote/show_treasurer');
            }else{
                return back()->withInput()->with('status', 'Unable to process Your vote at this time');
            }

    		}catch(Exeception $e){
    			throw $e;
    			DB::rollback();
    		}
    }
}
