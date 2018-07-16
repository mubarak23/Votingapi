@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="/add_student" ><button class="btn btn-primary right">Add Student</button></a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                            <tbody>
                             @foreach($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->full_name}}</td>
                                <td>{{$student->level}}</td>
                                <td><a href="/show_student/{{ $student->id}}"><button type="button" class="btn btn-primary">Student Details</button></a></td>
                        </tr>
                         @endforeach
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
