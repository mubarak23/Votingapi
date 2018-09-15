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
                                <!-- Default panel contents -->
                                <div class="panel-heading"> All Student</div>
                                      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                <!-- Table -->
                                <table class="table table-striped">
                                  <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Programme</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                  </tr>
                                  <tr>
                                    @forelse($students as $student)
                                  
                                    <td>{{ $student->id}}</td>
                                    <td>{{ $student->fullname}}</td>
                                    
                                    <td>{{ $student->programme }}</td>
                                    <td>{{ $student->level }}</td>
                                    <td><a href="/show_student/{{ $student->id}}"><button type="button" class="btn btn-primary">Student Details</button></a></td>
                                </tr>
                                  @empty
                                <tr> 
                                    <td>No Student Yet</td>
                                    </tr>
                                @endforelse
                                
                                </table>
                              </div>
                            </section>
						</div>
					</div>
				</div>
                @endsection

        