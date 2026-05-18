@extends('layout')

@section('content')
<h1>Departments</h1>

<a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">+ Add New Department</a>

<div class="card">
    <div class="card-body">
        @if ($departments->isEmpty())
            <p class="text-muted">No departments found. <a href="{{ route('departments.create') }}">Create one</a></p>
        @else
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Number of Employees</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $dept)
                        <tr>
                            <td>#{{ $dept->id }}</td>
                            <td>{{ $dept->department_name }}</td>
                            <td><span class="badge bg-info">{{ $dept->number_of_employees }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
