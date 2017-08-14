@extends('master')

@section('content')
    <div class="container">

        <h1 class="page-header">
            Employee {{ $employee['name'] }}
        </h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Name: </strong> {{ $employee['name'] }}</p>
                <p><strong>Email: </strong> {{ $employee['email'] }}</p>
                <p><strong>Phone: </strong> {{ $employee['phone'] }}</p>
                <p><strong>Address: </strong> {{ $employee['address'] }}</p>
                <p><strong>Position: </strong> {{ $employee['position'] }}</p>
                <p><strong>Salary: </strong> {{ $employee['salary'] }}</p>
                <p><strong>Skills: </strong> {{ implode(', ', array_column($employee['skills'], 'skill')) }}</p>
            </div>
        </div>

    </div>
@stop

