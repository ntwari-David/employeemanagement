@extends('layout')

@section('content')
<h1>📊 Comprehensive Report</h1>

<div class="alert alert-info">
    <strong>Report Overview:</strong> Showing all departments with employee and salary details
</div>

@foreach ($departments as $dept)
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                🏢 {{ $dept->department_name }} 
                <span class="badge bg-light text-dark">{{ $dept->employees->count() }} employees</span>
            </h5>
        </div>
        
        <div class="card-body">
            @if ($dept->employees->isEmpty())
                <p class="text-muted">No employees in this department</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Hire Date</th>
                                <th>Gross Salary</th>
                                <th>Deduction</th>
                                <th>Net Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dept->employees as $emp)
                                <tr>
                                    <td><strong>{{ $emp->first_name }} {{ $emp->last_name }}</strong></td>
                                    <td>{{ $emp->position }}</td>
                                    <td>{{ $emp->email }}</td>
                                    <td>{{ $emp->telephone }}</td>
                                    <td>{{ $emp->hire_date }}</td>
                                    <td>
                                        @if ($emp->salary)
                                            Rs. {{ number_format($emp->salary->gross_salary, 2) }}
                                        @else
                                            <span class="text-danger">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($emp->salary)
                                            Rs. {{ number_format($emp->salary->total_deduction, 2) }}
                                        @else
                                            <span class="text-danger">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($emp->salary)
                                            <strong>Rs. {{ number_format($emp->salary->net_salary, 2) }}</strong>
                                        @else
                                            <span class="text-danger">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endforeach

@if ($departments->isEmpty())
    <div class="alert alert-warning">
        No departments found. <a href="{{ route('departments.create') }}">Create one first</a>
    </div>
@endif

@endsection
