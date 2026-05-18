<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'telephone' => 'required|string',
            'hire_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());

        // Update department employee count
        $dept = Department::find($request->department_id);
        $dept->number_of_employees = $dept->employees()->count();
        $dept->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }
}
