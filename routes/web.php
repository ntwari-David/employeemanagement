<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ReportController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Salary;

// Public routes - redirect to home for now
Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (require login)
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Department routes
    Route::get('/departments', function () {
        $departments = Department::all();
        return view('departments-index', compact('departments'));
    })->name('departments.index');
    Route::get('/departments/create', function () {
        return view('departments-create');
    })->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    
    // Employee routes
    Route::get('/employees', function () {
        $employees = Employee::with('department')->get();
        return view('employees-index', compact('employees'));
    })->name('employees.index');
    Route::get('/employees/create', function () {
        $departments = Department::all();
        return view('employees-create', compact('departments'));
    })->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    
    // Salary routes (CRUD)
    Route::get('/salaries', function () {
        $salaries = Salary::with('employee')->get();
        return view('salaries-index', compact('salaries'));
    })->name('salaries.index');
    Route::get('/salaries/create', function () {
        $employees = Employee::doesntHave('salary')->get();
        return view('salaries-create', compact('employees'));
    })->name('salaries.create');
    Route::post('/salaries', [SalaryController::class, 'store'])->name('salaries.store');
    Route::get('/salaries/{salary}/edit', function (Salary $salary) {
        return view('salaries-edit', compact('salary'));
    })->name('salaries.edit');
    Route::put('/salaries/{salary}', [SalaryController::class, 'update'])->name('salaries.update');
    Route::delete('/salaries/{salary}', [SalaryController::class, 'destroy'])->name('salaries.destroy');
    
    // Report routes
    Route::get('/reports', function () {
        $departments = Department::with(['employees' => function ($query) {
            $query->with('salary');
        }])->get();
        return view('reports-index', compact('departments'));
    })->name('reports.index');
});
