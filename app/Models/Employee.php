<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'gender', 'position', 'email', 'telephone', 'hire_date', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }
}
