<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Social_dir;
use Carbon\Carbon;
use App\Student_vote;
use App\vote_count_social_dir;
use DB;

class social_dirController extends Controller
{
    //
      /**
   * @method process candidate
   * @var auth user
   * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
   * @return status
   */
    public function process_contest($student_id){

    	$student = Student::find($student_id);

    	$data = array(
    		'id'	=> $student->id
    		);
        try{
            DB::beginTransaction();

            $Social_dir = new Social_dir();
        $Social_dir->id = $data['id'];
        $Social_dir->position = 'Social Director';
        $Social_dir->vote_count = 0;

        if($Social_dir->save()){
            $student->is_candidate = 1;
            $student->save();
            DB::commit()
        return redirect()->route('home')->with('status', 'Social Director Position Added'); 

        }else{

            return redirect()->route('home')->with('status', 'Unable to process your contest Application at the moment');
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
            DB:beginTransaction();

            $process_vote = new vote_count_social_dir();
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
                $candidate_vote = Social_dir::where('id', $data['candidate_id'])->select('vote_count')->first();
                $vote_count = $candidate_vote->vote_count;
                $candidate_vote->vote_count = $vote_count + 1;
                $candidate_vote->save();
                return redirect()->route('vote/show_sport');
                DB::commit();

            }else{
                return back()->withInput()->with('status', 'Unable to process Your vote at this time');
            }

        }catch(Exeception $e){
            throw $e;
            DB::rollback()
        }
    }
}
