@extends('layouts.master')

@section('content')
<section>
  <br><br>
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default ">
              <div class="panel-heading">Select Voting Category</div>
              <div class="panel-body ">
                        <a href="Evoting/pre_candidate"><button class="btn btn-primary section">President</button></a> 

                  

                   <a href="Evoting/sec_gen_candidate"><button class="btn btn-primary section">Secetery General </button></a>

                   <a href="Evoting/asis_sec_gen_candidate"><button class="btn btn-primary section">Asist.Secetery General </button></a>
                   <a href="Evoting/fin_sec_candidate"><button class="btn btn-primary section">Financial Secetery</button></a>

                   <a href="Evoting/asis_fin_sec_candidate"><button class="btn btn-primary section">Asist. Financial Secetery </button></a>

                  
                       <a href="Evoting/sport_dir_candidate"><button class="btn btn-primary section">Sport Director </button></a>

                   
                    
                   <a href="Evoting/treasurer_candidate"><button class="btn btn-primary section">Treasurer </button></a>

                    

                   <a href="Evoting/academic_dir_candidate"><button class="btn btn-primary section">Academic Director </button></a>
                   <a href="Evoting/sales_dir_candidate"><button class="btn btn-primary section">Sales Director </button></a>

                   <a href="Evoting/pro_candidate"><button class="btn btn-primary section">PRO I </button></a> 

                    

                    <a href="Evoting/confirm_vote"><button class="btn btn-primary section">Confirm Vote </button></a>
              </div>
            </div>
          </div>
      </div>
  </div>

</section>

<div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-2">

            <div class="panel panel-default">
                      <div class="panel-heading">Presidential </div>
                      <div class="panel-body">

                           <table class="table table-striped">
                  <tr>
                    <th>Candidate ID</th>
                    <th>Position</th>
                    <th>Candidate Name</th>
                    <th>Action</th>
                  </tr>
                 @foreach($presidents as $president)
                  <tr>
                    <td><h4>{{ $president->id }}</h4></td>
                    <td><h4>{{ $president->position }}</h4></td>
                    <td><h4>{{ $president->full_name }}</h4></td>
                    <td>
                      
                      <div class="">
                        <span class="">
                          <form method="post" action="/vote_pre">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="candidate_id" value="{{ $president->id }}" >
                            <input type="hidden" name="candidate_name" value="{{ $president->full_name }}" >
                            <input type="hidden" name="vote_count" value="1">
                            <input type="submit" name="pre_vote" class="btn btn-lg btn-primary" value="Vote">
                          </form>
                        </span>
                      </div>

                    </td>
                  </tr>
                  @endforeach
                 
                </table>
             

          


                      </div>
                    </div>


        </div>
           
          
   
          
         
      </div>

      </div> 



@endsection