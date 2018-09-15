@extends('layouts.master')

@section('content')
@include('includes.top-nav')

<div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-2">

            <div class="panel panel-default">
                      <div class="panel-heading">Academic Director </div>
                      <div class="panel-body">

                           <table class="table table-striped">
                  <tr>
                    <th>Candidate ID</th>
                    <th>Position</th>
                    <th>Candidate Name</th>
                    <th>Action</th>
                  </tr>
                 @forelse($Academic_cands as $Academic_cand)
                  <tr>
                    <td><h4>{{ $Academic_cand->id }}</h4></td>
                    <td><h4>{{ $Academic_cand->position }}</h4></td>
                    <td><h4>{{ $Academic_cand->full_name }}</h4></td>
                    <td>
                      
                      <div class="">
                        <span class="">
                          <form method="post" action="{{ url('vote/vote_academic_dir')}}">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="candidate_id" value="{{ $Academic_cand->id }}" >
                            <input type="hidden" name="candidate_name" value="{{ $Academic_cand->full_name }}" >
                            <input type="hidden" name="vote_count" value="1">
                            <input type="submit" name="Academic_cand" class="btn btn-lg btn-primary" value="Vote">
                          </form>
                        </span>
                      </div>

                    </td>
                  </tr>
                  @empty
                                <tr> 
                                    <td>No Cnadidate for this position yet</td>
                                    </tr>
                                @endforelse
                 
                </table>
             

          


                      </div>
                    </div>


        </div>
           
          
   
          
         
      </div>

      </div> 



@endsection