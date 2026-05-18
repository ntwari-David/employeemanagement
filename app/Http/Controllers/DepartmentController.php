<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        Department::create([
            'department_name' => $request->department_name,
            'number_of_employees' => 0,
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }
}
