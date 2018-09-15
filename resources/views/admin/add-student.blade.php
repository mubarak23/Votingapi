 @extends('layouts.admin-master')

@section('content')

    <div class="col-md-8">
          <div class="main-col">
            <div class="block">
              <h1 class="pull-left">Welcome Home Admin</h1>
              <h4 class="pull-right">Full Access Here</h4>
              <div class="clearfix"></div>
              <hr>
                            <section>
                            <div class="row">
                            <div class="col-md-4"> <i class="fa fa-user fa-5x fa-border active"></i>
                                <h4>Total Number of Candidate</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-text-o fa-5x fa-border"></i>
                                <h4>Total Number Of Total Vote</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-word-o fa-5x fa-border"></i>
                                <h4>Total Number of Student</h4>
                                </div>
                            </div>
                            </section>

                            <section>

                             <div class="panel panel-default">
                              <div class="panel-heading">Add Candidate</div>
                              <div class="panel-body">
                                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                    <form role="form" enctype="multipart/form-data" method="post" action="/add_student">
                                      @csrf
                                    <div class="form-group">
                                        <label>Full Name</label><input type="text" name="full_name" id="first_name" class="form-control" placeholder="Enter Your Full Name" value="{{ old('full_name')}}" />
                                        <small class="error">{{ $errors->first('full_name')}}</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Registration Number</label><input type="text" name="reg_no" id="reg_num" class="form-control" placeholder="Enter The Registration Number" value="{{ old('reg_no') }}" />
                                        <small class="error">{{ $errors->first('reg_no')}}</small>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" id="faculty" name="faculty" value="Engineering">
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name="programme" value="{{ old('programme') }}" id="programme" class="form-control">
                                            <option value="">Select Department</option>
                                            <option value="Electrical Engineering">Electrical Engineering</option>
                                            <option value="Civil Engineering">Computer Engineering</option>
                                            <option value="Agricultural Engineering">Agricultural Engineering</option>
                                            <option value="Mechanical Engineering">Mechanical Engieering</option>
                                            <option value="Machatronic Engineering">Mechatronic Engineering</option>
                                        </select>
                                        <small class="error">{{ $errors->first('programme')}}</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" value="{{ old('level') }}" id="level" class="form-control">
                                            <option value="">Select Level</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        </select>
                                        <small class="error">{{ $errors->first('level')}}</small>
                                    </div>


                                    
                                    <input type="submit" name="add_student" class="btn btn-primary" value="Add Candidate"/>
                                </form>
                              </div>
                            </div>
                                
                                 
                            </section>

                            
            </div>
          </div>
        </div>

         @endsection