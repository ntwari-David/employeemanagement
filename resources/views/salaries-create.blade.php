@extends('layout')

@section('content')
<h1>Add New Salary Record</h1>

<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee:</label>
                <select class="form-control @error('employee_id') is-invalid @enderror" 
                        id="employee_id" name="employee_id" required>
                    <option value="">Select Employee</option>
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gross_salary" class="form-label">Gross Salary:</label>
                <input type="number" step="0.01" class="form-control @error('gross_salary') is-invalid @enderror" 
                       id="gross_salary" name="gross_salary" required>
                @error('gross_salary')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_deduction" class="form-label">Total Deduction:</label>
                <input type="number" step="0.01" class="form-control @error('total_deduction') is-invalid @enderror" 
                       id="total_deduction" name="total_deduction" required>
                @error('total_deduction')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 alert alert-info">
                <strong>Net Salary will be calculated automatically:</strong>
                <div id="net_salary_display">Gross - Deduction = Net</div>
            </div>

            <button type="submit" class="btn btn-primary">Save Salary</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script>
document.getElementById('gross_salary').addEventListener('input', updateNet);
document.getElementById('total_deduction').addEventListener('input', updateNet);

function updateNet() {
    const gross = parseFloat(document.getElementById('gross_salary').value) || 0;
    const deduction = parseFloat(document.getElementById('total_deduction').value) || 0;
    const net = gross - deduction;
    document.getElementById('net_salary_display').textContent = 
        `Rs. ${gross.toFixed(2)} - Rs. ${deduction.toFixed(2)} = Rs. ${net.toFixed(2)}`;
}
</script>
@endsection
