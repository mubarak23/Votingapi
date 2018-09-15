<?php

namespace App\Http\Controllers;
use App\President;
use App\Vice_president;
use App\Sec_gen;
use App\Asis_sec_gen;
use App\Academic_cand;
use App\fin_sec;
use App\Sale_cand;
use App\Social_dir;
use App\sport_dir;
use App\Asist_fin_sec;
use App\Pro_cand;
use App\Welfare;
use App\Treasurer;
use App\vote_count_president;

use Illuminate\Http\Request;

class ResultComputeController extends Controller
{
    //

   public function show_result(){
   	//total number candidate per position
   	$num_president = President::count();
   	$num_vice  = Vice_president::count();
   	$num_sec_gen = Sec_gen::count();
   	$num_asis_sec_gen = Asis_sec_gen::count();
   	$num_academic = Academic_cand::count();
   	$num_fin_sec =  fin_sec::count();
   	$num_asist_fin = Asist_fin_sec::count();
   	$num_social   = Social_dir::count();
   	$num_sport   =  sport_dir::count();
   	$num_welfare  = Welfare::count();
   	$num_trea    = Treasurer::count();
   	$num_sales   = Sale_cand::count();
   	$num_pro    = Pro_cand::count();

        return view('admin.admin-result', compact('num_president', 'num_vice', 'num_sec_gen', 'num_asis_sec_gen', 'num_academic', 'num_fin_sec','num_asist_fin', 'num_social', 'num_sport', 'num_welfare', 'num_trea', 'num_sales', 'num_pro'));
   	}


   	//first way of collecting voting result
   	public function compute_president($num_candidate){
   			//loop through the the  nuber of candidate
   			// foreach( $num_candidate as $candidate){
   			// 	//find the total vote caste this partiular candidate
   			// 	$total_vote = vote_count_president::count()->where('canddidate_id', $candidate); 
   			// }
         //collect total vote count from the vote count column
         $pre_vote = President::all()->select('vote_count');

   	}
    


}
