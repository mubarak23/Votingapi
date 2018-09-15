<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sale_cand;
use Carbon\Carbon;
use App\Student_vote;
use App\vote_count_sales_dir;
use DB;

class SaleCandController extends Controller
{
    //
     /**
   * @method process candidate
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */
	public function process_contest($student_id){

    	//find the student id
    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id	
    			);

    	//process the student contest
            try{
        DB::beginTrensaction();
        $sale_cand = new Sale_cand();
        $sale_cand->students_id = $data->id;
        $sale_cand->position = "Sale Director";
        $sale_cand->vote_count = 0;

        if($sale_cand->save()){
            $student->is_candidate = 1;
            $student->save();
              DB::commit(); 
            return redirect()->route('home')->with('status', 'Sales Director Added');
        }else{

            return redirect()->route('home')->with('status', 'Unable to Add Sale Director');
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
   * @return next voting position
   */
    public function process_vote(Request $request){
        $data = $request->all();

        try{
            $process_vote = new vote_count_sales_dir();
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
                $candidate_Votecount = Sale_cand::where('id', $data['candidate_id'])->select('vote_count')->first();
                $vote_count = $candidate_Votecount->vote_count;
                $candidate_Votecount->vote_count = $vote_count + 1;
                $candidate_Votecount->save();
                DB::commit();
                return redirect()->route('vote/show_social');
            }else{
                return back()->withInput()->with('status', 'Unable to process Your vote at this time');
            }

        }catch(Exeception $e){

            throw $e;
            DB::rollback();

        }


    }


}
