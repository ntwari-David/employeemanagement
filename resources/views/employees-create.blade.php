@extends('layout')

@section('content')
<h1>Add New Employee</h1>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                           id="first_name" name="first_name" required>
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                           id="last_name" name="last_name" required>
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select class="form-control @error('gender') is-invalid @enderror" 
                            id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="position" class="form-label">Position:</label>
                    <input type="text" class="form-control @error('position') is-invalid @enderror" 
                           id="position" name="position" required>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone:</label>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror" 
                       id="telephone" name="telephone" required>
                @error('telephone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="hire_date" class="form-label">Hire Date:</label>
                    <input type="date" class="form-control @error('hire_date') is-invalid @enderror" 
                           id="hire_date" name="hire_date" required>
                    @error('hire_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="department_id" class="form-label">Department:</label>
                    <select class="form-control @error('department_id') is-invalid @enderror" 
                            id="department_id" name="department_id" required>
                        <option value="">Select Department</option>
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Employee</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
