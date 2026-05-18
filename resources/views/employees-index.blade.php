@extends('layout')

@section('content')
<h1>Employees</h1>

<a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">+ Add New Employee</a>

<div class="card">
    <div class="card-body">
        @if ($employees->isEmpty())
            <p class="text-muted">No employees found. <a href="{{ route('employees.create') }}">Add one</a></p>
        @else
            <table class="table table-hover table-sm">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Hire Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $emp)
                        <tr>
                            <td>#{{ $emp->id }}</td>
                            <td>{{ $emp->first_name }} {{ $emp->last_name }}</td>
                            <td>{{ $emp->position }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->telephone }}</td>
                            <td>{{ $emp->department->department_name }}</td>
                            <td>{{ $emp->hire_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
