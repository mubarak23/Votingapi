<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sec_gen;
use App\vote_count_sec_gen;
use App\Student_vote;
use DB;
use Carbon\Carbon;



class SecGenController extends Controller
{
    //

     /**
   * @method process vote
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */
    public function contest_sec_gens($student_id){
    	//find the student detaild from student model
    	$student = Student::find($student_id);

    	//add all the student details to data array

    	$data = array(
    		'id'	=> $student->id,
    		'level'	=> $student->level,
    		'programme'	=> $student->programme	
    			);

    	//add the student to the sec gen model
        try{
            DB::beginTranaction();
            $sec_gen = new Sec_gen();
            $sec_gen->students_id = $data['id'];
            $sec_gen->position = "Sec General";
            $sec_gen->vote_count = 0;

            if($sec_gen->save()){
                $student->is_candidate = 1;
                $student->save();
                DB::commit();
                return redirect()->route('home')->with('status', 'Contestant Added');

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
   * @return next voting position
   */

    public function process_vote(Request $request){
            $data = $request->all();

            try{
                DB::beginTranaction();
                $process_vote = new vote_count_sec_gen();
                $process_vote->students_id = 1;
                $process_vote->students_fullname = 'Mubarak Aminu'; //also get this from Auth
                $process_vote->vote = 1;
                $process_vote->candidate_id = $data['candidate_id'];
                $vote_president->candidate_name = $data['candidate_name'];
                $process_vote->vote_time = Carbon::now();
                $process_vote->vote_status = 1;

                if($process_vote->save()){
                    //rpcoess student vote model
                    $student_vote = new Student_vote();
                    $student_vote->students_id = 1; //get from auth function
                    $student_vote->candidate_id = $data['candidate_id'];
                    $student_vote->candidate_name = $data['candidate_name'];
                    $student_vote->position = 'President';
                    $student_vote->save();

                    $candidate_vote = Sec_gen::where('id', $data['candidate_id'])->select('vote_count')->first();
                    $vote_count = $candidate_vote->vote_count;
                    $candidate_vote->vote_count = $vote_count +1;
                    $candidate_vote->save();
                    DB::commit();
                    return redirect()->route('vote/show_asist_sec');

                }else{

                    return back()->withInput()->with('status', 'Unable to process Ypur vote at this time');
                }

            }catch(Exeception $e){
                throw $e;
                DB::rollback();
            }
    }


}
