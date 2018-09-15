@extends('layouts.master')

@section('content')
@include('includes.top-nav')

<div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-2">

            <div class="panel panel-default">
                      <div class="panel-heading">Asist. Financial Secetery </div>
                      <div class="panel-body">

                           <table class="table table-striped">
                  <tr>
                    <th>Candidate ID</th>
                    <th>Position</th>
                    <th>Candidate Name</th>
                    <th>Action</th>
                  </tr>
                 @forelse($asist_fin_secs as $asist_fin_sec)
                  <tr>
                    <td><h4>{{ $asist_fin_sec->id }}</h4></td>
                    <td><h4>{{ $asist_fin_sec->position }}</h4></td>
                    <td><h4>{{ $asist_fin_sec->full_name }}</h4></td>
                    <td>
                      
                      <div class="">
                        <span class="">
                          <form method="post" action="vote/vote_fin_sec">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="candidate_id" value="{{ $asist_fin_sec->id }}" >
                            <input type="hidden" name="candidate_name" value="{{ $asist_fin_sec->full_name }}" >
                            <input type="hidden" name="vote_count" value="1">
                            <input type="submit" name="asist_fin_sec" class="btn btn-lg btn-primary" value="Vote">
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