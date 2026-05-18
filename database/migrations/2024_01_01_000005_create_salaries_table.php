<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->decimal('gross_salary', 10, 2);
            $table->decimal('total_deduction', 10, 2);
            $table->decimal('net_salary', 10, 2);
            $table->foreignId('employee_id')->constrained('employees');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
