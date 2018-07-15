@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                                <td><a href="/contest_pre/{{ $student->id}}"><button type="button" class="btn btn-primary">Contest President</button></a></td>
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
