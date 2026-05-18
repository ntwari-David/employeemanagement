@extends('layout')

@section('content')
<h1>Add New Department</h1>

<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="department_name" class="form-label">Department Name:</label>
                <input type="text" class="form-control @error('department_name') is-invalid @enderror" 
                       id="department_name" name="department_name" required>
                @error('department_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save Department</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
