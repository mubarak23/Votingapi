@extends('layouts.master')

@section('content')

<div class="container centered">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4 top">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">OTP Verification</h3>
            
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="Autharization/verify_otp">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Submit Your OTP Here" name="otp" type="text">
                  <input class="form-control" placeholder="Submit Your OTP Here" name="student_id" value="" type="hidden">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="varify" value="Verify OTP">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>


@endsection
