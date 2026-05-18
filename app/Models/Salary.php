<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['gross_salary', 'total_deduction', 'net_salary', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
