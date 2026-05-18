@echo off
REM Create all necessary directories
echo Creating directories...
mkdir "resources\views\auth" 2>nul
mkdir "resources\views\departments" 2>nul
mkdir "resources\views\employees" 2>nul
mkdir "resources\views\salaries" 2>nul
mkdir "resources\views\reports" 2>nul
mkdir "app\Http\Middleware" 2>nul
echo.
echo All directories created successfully!
echo.
echo Next steps:
echo 1. Copy blade template files from BLADE_VIEWS_PART*.txt to their folders
echo 2. Copy AUTH_LOGIN_VIEW.txt content to resources\views\auth\login.blade.php
echo 3. Run: php artisan migrate
echo 4. Run: php artisan serve
echo 5. Visit: http://localhost:8000
