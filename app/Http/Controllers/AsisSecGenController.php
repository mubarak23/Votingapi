<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asis_Sec_gen;
use App\Student;
use App\Student_vote;
use App\vote_count_asist_sec_gen;
use DB;
use Carbon\Carbon;

class AsisSecGenController extends Controller
{
    //

    /**
   * @method process contest
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */

    public function process_contest($student_id){

    		//find the student that want to contest
    	$student = Student::find($student_id);

    		$data = array(
    			'id'	=> $student->id
    			);

    	//add student that will contest for the postion in the required poation
            try{
            DB::beginTransaction();

             $asis_sec_gen = new Asis_Sec_gen();
            $asis_sec_gen->students_id = $data['id'];
            $asis_sec_gen->position = "Sec General";
            $asis_sec_gen->vote_count = 0;

            if( $asis_sec_gen->save() ){
                $student->is_candidate = 1;
                $student->save();
                DB::commit();

                return redirect()->route('home')->with('status', 'Asis Sec Gen has Been Added');
            }else{
                 return redirect()->route('home')->with('status', 'Unable to Add Contestant');  
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
   * @return proceed to the next voting position
   */

    public function process_vote(Request $request){
        $data = $request->all();

        try{
            DB::beginTransaction();
             $process_vote = new vote_count_asist_sec_gen();
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
                return redirect()->route('vote/show_fin_sec');
                DB::commit();

            }else{
                return back()->withInput()->with('status', 'Unable to process Your vote at this time');
            }

        }catch(Exeception $e){

            throw $e;
            DB::rollback();
        }
    }


}
