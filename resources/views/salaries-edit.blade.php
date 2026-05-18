@extends('layout')

@section('content')
<h1>Edit Salary Record</h1>

<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <h5 class="card-title mb-3">
            Employee: {{ $salary->employee->first_name }} {{ $salary->employee->last_name }}
        </h5>

        <form action="{{ route('salaries.update', $salary) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="gross_salary" class="form-label">Gross Salary:</label>
                <input type="number" step="0.01" class="form-control @error('gross_salary') is-invalid @enderror" 
                       id="gross_salary" name="gross_salary" value="{{ $salary->gross_salary }}" required>
                @error('gross_salary')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_deduction" class="form-label">Total Deduction:</label>
                <input type="number" step="0.01" class="form-control @error('total_deduction') is-invalid @enderror" 
                       id="total_deduction" name="total_deduction" value="{{ $salary->total_deduction }}" required>
                @error('total_deduction')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 alert alert-info">
                <strong>Net Salary:</strong>
                <div id="net_salary_display">
                    Rs. {{ number_format($salary->gross_salary, 2) }} - Rs. {{ number_format($salary->total_deduction, 2) }} = Rs. {{ number_format($salary->net_salary, 2) }}
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Salary</button>
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
