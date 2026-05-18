# EMS - COMPLETE FILE MAPPING

This file shows EXACTLY what code goes into which file.

## STEP 1: RUN BATCH FILE
Double-click: setup_directories.bat
(This creates all necessary folders)

---

## STEP 2: CREATE BLADE VIEW FILES

### FILE 1: resources/views/auth/login.blade.php
Copy content from AUTH_LOGIN_VIEW.txt (the file you already have)

### FILE 2: resources/views/auth/register.blade.php
Copy from BLADE_VIEWS_PART1.txt
Look for: ====================================================================
          FILE: resources/views/auth/register.blade.php
          ====================================================================

### FILE 3: resources/views/dashboard.blade.php
Already created ✓

### FILE 4: resources/views/departments/index.blade.php
Copy from BLADE_VIEWS_PART1.txt
Look for: ====================================================================
          FILE: resources/views/departments/index.blade.php
          ====================================================================

### FILE 5: resources/views/departments/create.blade.php
Copy from BLADE_VIEWS_PART1.txt
Look for: ====================================================================
          FILE: resources/views/departments/create.blade.php
          ====================================================================

### FILE 6: resources/views/employees/index.blade.php
Copy from BLADE_VIEWS_PART2.txt
Look for: ====================================================================
          FILE: resources/views/employees/index.blade.php
          ====================================================================

### FILE 7: resources/views/employees/create.blade.php
Copy from BLADE_VIEWS_PART2.txt
Look for: ====================================================================
          FILE: resources/views/employees/create.blade.php
          ====================================================================

### FILE 8: resources/views/salaries/index.blade.php
Copy from BLADE_VIEWS_PART2.txt
Look for: ====================================================================
          FILE: resources/views/salaries/index.blade.php
          ====================================================================

### FILE 9: resources/views/salaries/create.blade.php
Copy from BLADE_VIEWS_PART3.txt
Look for: ====================================================================
          FILE: resources/views/salaries/create.blade.php
          ====================================================================

### FILE 10: resources/views/salaries/edit.blade.php
Copy from BLADE_VIEWS_PART3.txt
Look for: ====================================================================
          FILE: resources/views/salaries/edit.blade.php
          ====================================================================

### FILE 11: resources/views/reports/index.blade.php
Copy from BLADE_VIEWS_PART3.txt
Look for: ====================================================================
          FILE: resources/views/reports/index.blade.php
          ====================================================================

---

## STEP 3: VERIFY ALL PHP FILES EXIST

✓ app/Http/Controllers/AuthController.php - CREATED
✓ app/Http/Controllers/DepartmentController.php - CREATED
✓ app/Http/Controllers/EmployeeController.php - CREATED
✓ app/Http/Controllers/SalaryController.php - CREATED
✓ app/Http/Controllers/ReportController.php - CREATED

✓ app/Models/Department.php - CREATED
✓ app/Models/Employee.php - CREATED
✓ app/Models/Salary.php - CREATED

✓ database/migrations/2024_01_01_000003_create_departments_table.php - CREATED
✓ database/migrations/2024_01_01_000004_create_employees_table.php - CREATED
✓ database/migrations/2024_01_01_000005_create_salaries_table.php - CREATED

✓ routes/web.php - UPDATED
✓ resources/views/layout.blade.php - CREATED
✓ .env - CONFIGURED FOR MYSQL

---

## STEP 4: DATABASE SETUP

1. Open XAMPP Control Panel
2. Start Apache
3. Start MySQL
4. Open phpMyAdmin (http://localhost/phpmyadmin)
5. Click "New" button
6. Create database named: ems
7. Click Create

---

## STEP 5: INSTALL AND MIGRATE

Open Command Prompt and navigate to project:
```
cd c:\Users\Student\Desktop\laravel\EMS
```

Run migrations:
```
php artisan migrate
```

---

## STEP 6: START SERVER

```
php artisan serve
```

You should see:
```
Starting Laravel development server: http://127.0.0.1:8000
```

---

## STEP 7: OPEN IN BROWSER

Visit: http://localhost:8000
or: http://127.0.0.1:8000

You will see login page. Click "Register here" to create account.

---

## COMPLETE FILE CHECKLIST

After following all steps, you should have:

✓ 5 Controllers (PHP files)
✓ 3 Models (PHP files)
✓ 3 Migrations (PHP files)
✓ 1 AuthController (PHP file)
✓ 11 Blade Views (HTML files)
✓ Updated routes/web.php
✓ Updated .env file
✓ Created MySQL database

Total: 26 files created/modified

---

If you get errors, check:
1. Database `ems` is created in phpMyAdmin
2. All blade files are in correct folders
3. PHP and MySQL are running
4. You ran `php artisan migrate`

GOOD LUCK! 🍀
