@extends('layouts.admin-master')

@section('content')
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Student</div>
                <div class="right">
                  <a href="{{ route('home')}}"><button class="btn btn-primary">Home</button></a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <div class="row">
                          <div class="col-md-6">
                            <div>
                              <label>Full Name:</label>
                              <p>{{ $student->full_name }}</p>
                            </div>
                            <div>
                              <label>Registration Number:</label>
                              <p>{{ $student->reg_no}}</p>
                            </div>
                            <div>
                              <label>Programme:</label>
                              <p>{{ $student->programme}}</p>
                            </div>
                            <div>
                              <label>Level:</label>
                              <p>{{ $student->level}}</p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <h3>Available Position for Student To Contest</h3>
                            @csrf
                            <div>
                              <a href="/contest_pre/{{ $student->id }}"><button class="btn btn-primary">President</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="/contest_vp/{{ $student->id }}"><button class="btn btn-primary">Vice President</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="/contest_secgen/{{ $student->id}}"><button class="btn btn-primary">Sec General</button></a>
                            </div>
                            <br><div>
                              <a href="/contest_asis_sec/{{ $student->id }}"><button class="btn btn-primary">Asis Sec Gen</button></a>
                            </div>
                            <br><div>
                              <a href="{{ url('contest_fin_sec/{{$student->id}}') }}"><button class="btn btn-primary">Fin Sec</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ url('contest_asist_fin_sec/{{$student->id}}') }}"><button class="btn btn-primary">Vice Fin Sec</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ur('/contest_treasurer/{{ $student->id }}')}}"><button class="btn btn-primary">Treasurer</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ur('/contest_welfare/{{ $student->id }}')}}"><button class="btn btn-primary">Welfare</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ url('contest_academic/{{$student->id}}') }}"><button class="btn btn-primary">Academic Director</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ url('contest_sales_dir/{{$student->id}}') }}"><button class="btn btn-primary">Sale Director</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ url('contest_sport_dir/{{$student->id}}') }}"><button class="btn btn-primary">Sport Director</button></a>
                            </div>
                            <br>
                            <div>
                              <a href="{{ url('contest_social_dir/{{$student->id}}') }}"><button class="btn btn-primary">Social Dorector</button></a>
                            </div>

                          </div>
                      </div>
                        
                </div>
            </div>
        </div>
        @endsection