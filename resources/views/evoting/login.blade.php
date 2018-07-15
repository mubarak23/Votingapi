@extends('layouts.master')

@section('content')


<div class="container centered">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4 top">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login And Cast Your Voting</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="/student_login">

			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
              <div class="form-group">
                <label>Select Programme of Study</label>
                  <select name="programme" class="form-control">

                    <option name="Electrical Engineering">
                      Electrical Engineering
                    </option>
                    <option name="Computer Engineering">
                      Computer Engineering
                    </option>
                    <option value="Telecommunication Engineering">
                        Telecommunication Engineering
                    </option>
                  </select>
              </div>
              <label>Enter Your Registration Number</label>
			    		<div class="form-group">
			    			<input class="form-control" placeholder=" Enter Your Reg Number" name="reg_number" type="text" value="">
			    		</div>
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>



@endsection
