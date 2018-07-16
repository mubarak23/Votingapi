@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Student</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-group" action="/add_student " method="post">
                        @csrf
                        <div class="form-control">
                               <label>Full Name</label>
                               <input class="form-control" type="text" name="full_name" value="{{ old('full_name') }}"> 
                               <small class="error">{{ $errors->first('full_name')}}</small>
                        </div>
                        <div class="form-control">
                               <label>Registration Numer</label>
                               <input  class="form-control" type="text" name="reg_no" value="{{ old('reg_no') }}"> 
                               <small class="error">{{ $errors->first('reg_no')}}</small>
                        </div>
                        <div class="form-control">
                               <label>Programme</label>
                               <input type="text"  class="form-control" name="programme" value="{{ old('programme') }}"> 
                               <small class="error">{{ $errors->first('programme')}}</small>
                        </div>
                        <div class="form-control">
                               <label>Level</label>
                               <input type="text" name="level" value="{{ old('level')}}" class="form-control"> 
                               <small class="error">{{ $errors->first('level')}}</small>
                        </div>
                        <div class="form-control">
                               
                               <input type="submit" class="btn btn-primary" name="add_student" value="Add Student"> 
                        </div>
                        
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
