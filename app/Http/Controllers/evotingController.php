<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\checkotp;
use App\verifiedotp;
use App\Student;
use App\President;
use App\Vice_president;
use App\sec_gen;
use App\Asis_sec_gen;
use App\fin_sec;
use App\Sale_cand;
use App\Social_dir;
use App\sport_dir;
use App\Asist_fin_sec;
use App\Pro_cand;
use App\Academic_cand;
use App\Welfare;
use App\Treasurer;
use Validator, Response, DB;



class evotingController extends Controller
{
    //

    public function index(){
    	return view('evoting.home');

    }

    public function view_auth(){
    	return view('evoting.login');
    }



    public function view_opt(){
    	return view('evoting.submitopt');

    }



    public function verified_login(Request $request){
    		return redirect()->route('show_president');
/*
    	$this->validate($request, [
                'programme'  => 'required',
                'reg_number'  => 'required'
                ]);

    	$data = $request->all();

    	$programme = $data['programme'];
    	$reg_number = $data['reg_number'];

    	$verified_login = Student::where('programme', $programme)->where('reg_no', $reg_number)->get();


    	$verified_login = DB::table('students')->select('id', 'reg_no')->where('programme', $programme)->where('reg_no', $reg_number);


    	if($verified_login){

    		return view('evoting.submitopt' );

    	}else{

    	return 'Failed Login';
	
    	}


    	return response::json(array(
    				'status' => true,
    				'message' => 'Student Successfully Verified',
    				'data'		=> $verified_login
    			), 200);

*/
    }

    public function process_otp(Request $request){

            $data = $request->all();

            //check if the submitted opt has been used
            //$check = verifiedotp::find('')

    }

    public function getlogout(){

    Auth::logout();
    return redirect()->route("ivicHome");

   }


    public function show_voting($position_id){
        //pull the candidate for the first postion
        //create id for each position

        return view('evoting.vote');

    }


    public function president(){        

                //find all candidate in that position
                $president = President::all();
                //$president = Student::all();

                return view('evoting.vote')->with('presidents', $president);
    }



    public function vp(){

            $vp = Vice_president::all();
            return view('evoting.vote_vp')->with('Vice_presidents', $vp);
            
    }

  public function sec_gen(){

            $sec_gen = sec_gen::all();
            return view('evoting.vote_sec')->with('sec_gens', $sec_gen);
            
    }

public function asissec_gen(){

            $asis_sec_gen = Asis_sec_gen::all();
            return view('evoting.vote_asis_sec')->with('asis_sec_gens', $asis_sec_gen);      
    }

 public function fin_sec(){

            $fin_sec = fin_sec::all();
            return view('evoting.vote_fin_sec')->with('fin_secs', $fin_sec);      
    }


 public function asist_fin_sec(){
    $asist_fin_sec = Asist_fin_sec::all();
    return view('evoting.vote_asist_fin_sec')->with('asist_fin_secs', $asist_fin_sec);
 } 


 public function sales_dir(){
    $sales_dir = Sale_cand::all();
    return view('evoting.vote_sales')->with('sales_dir', $sales_dir);
 }   

 public function sport_dir(){
    $sport_dir = sport_dir::all();
    return view('evoting.vote_sport')->with('sports_dir', $sport_dir);
 }

  public function pro(){
    $pro = Pro_cand::all();
    return view('evoting.vote_pro')->with('pros', $pro);
 }


  public function academic_dir(){
    $Academic_cand = Academic_cand::all();
    return view('evoting.vote_academic')->with('Academic_cands', $Academic_cand);
 }

  public function social_dir(){
    $social_dir = Social_dir::all();
    return view('evoting.vote_social')->with('social_dirs', $social_dir);
 } 

  public function welfare(){
    $Welfare = Welfare::all();
    return view('evoting.vote_Welfare')->with('Welfares', $Welfare);
 } 

 public function treasurer(){
    $treasurer = Treasurer::all();
    return view('evoting.vote_treasurer')->with('treasurers', $treasurer);
 } 


 public function confirm_vote(){
        return "Good job Welldone";

 }  



}
