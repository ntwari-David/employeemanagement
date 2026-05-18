# EMS Laravel Project - Setup Instructions

## Step 1: Manual Directory Creation
Create these folders in `resources\views\`:
- departments
- employees
- salaries
- reports
- auth

## Step 2: Database Setup
1. Open phpMyAdmin in XAMPP
2. Create a new database named `ems`
3. Run migrations using: `php artisan migrate`

## Step 3: Files Already Created
The following files have been created automatically:
- Models: Department, Employee, Salary (in app\Models\)
- Controllers: DepartmentController, EmployeeController, SalaryController, ReportController
- Migrations: 3 migration files for tables
- Layout view: layout.blade.php

## Step 4: Next Steps
Copy the provided blade files into their respective folders in resources\views\

## Step 5: Update Routes
Add the routes to routes\web.php

## Step 6: Create Authentication
Run: `php artisan make:auth`

All code is provided below - create files manually as needed.
