@extends('layout')

@section('content')
<h1>Salaries Management</h1>

<a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">+ Add New Salary</a>

<div class="card">
    <div class="card-body">
        @if ($salaries->isEmpty())
            <p class="text-muted">No salary records found. <a href="{{ route('salaries.create') }}">Add one</a></p>
        @else
            <table class="table table-hover table-sm">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Gross Salary</th>
                        <th>Deduction</th>
                        <th>Net Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salaries as $salary)
                        <tr>
                            <td>#{{ $salary->id }}</td>
                            <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                            <td>Rs. {{ number_format($salary->gross_salary, 2) }}</td>
                            <td>Rs. {{ number_format($salary->total_deduction, 2) }}</td>
                            <td><strong>Rs. {{ number_format($salary->net_salary, 2) }}</strong></td>
                            <td>
                                <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('salaries.destroy', $salary) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
