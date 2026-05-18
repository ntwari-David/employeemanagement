<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $departments = Department::with(['employees' => function ($query) {
            $query->with('salary');
        }])->get();

        return view('reports.index', compact('departments'));
    }
}
