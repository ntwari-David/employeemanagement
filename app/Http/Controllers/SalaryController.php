<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::doesntHave('salary')->get();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id|unique:salaries',
            'gross_salary' => 'required|numeric|min:0',
            'total_deduction' => 'required|numeric|min:0',
        ]);

        $net_salary = $request->gross_salary - $request->total_deduction;

        Salary::create([
            'employee_id' => $request->employee_id,
            'gross_salary' => $request->gross_salary,
            'total_deduction' => $request->total_deduction,
            'net_salary' => $net_salary,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary record created successfully!');
    }

    public function edit(Salary $salary)
    {
        return view('salaries.edit', compact('salary'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'gross_salary' => 'required|numeric|min:0',
            'total_deduction' => 'required|numeric|min:0',
        ]);

        $net_salary = $request->gross_salary - $request->total_deduction;

        $salary->update([
            'gross_salary' => $request->gross_salary,
            'total_deduction' => $request->total_deduction,
            'net_salary' => $net_salary,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully!');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully!');
    }
}
