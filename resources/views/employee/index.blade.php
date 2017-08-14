@extends('master')

@section('content')
    <div class="container">

        <h1 class="page-header">
            Employees
        </h1>

        <input class="form-control search" name="search" placeholder="Search...">

        <div class="table table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr data-email="{{ $employee['email'] }}">
                            <td><a href="{{ route('employee.show', $employee['id']) }}">{{ $employee['id'] }}</a></td>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td>{{ $employee['position'] }}</td>
                            <td>{{ $employee['salary'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop

@section('script')
    <script>
        $('input[name=search]').on('input', function() {
            var email = $(this).val();

            if (email === '')
                $('[data-email]').show();
            else {
                $('tr[data-email]').hide();
                $('tr[data-email*=' + email + ']').show();
            }
        });
    </script>
@stop
