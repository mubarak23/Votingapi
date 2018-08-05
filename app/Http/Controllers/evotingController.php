<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\checkotp;
use App\verifiedotp;
use App\Student;
use App\President;
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
    		//return "Good Here";

    	$this->validate($request, [
                'programme'  => 'required',
                'reg_number'  => 'required'
                ]);

    	$data = $request->all();

    	$programme = $data['programme'];
    	$reg_number = $data['reg_number'];

    	$verified_login = Student::where('programme', $programme)->where('reg_no', $reg_number)->get();


    	/*$verified_login = DB::table('students')->select('id', 'reg_no')->where('programme', $programme)->where('reg_no', $reg_number);*/


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


    }

    public function process_otp(Request $request){

            $data = $request->all();

            //check if the submitted opt has been used
            //$check = verifiedotp::find('')

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


}
