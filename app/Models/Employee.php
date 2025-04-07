<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone_number', 
        'hire_date', 
        'job_id', 
        'salary', 
        'manager_id', 
        'department_id'
    ];

    /**
     * Get the job that the employee has.
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }

    /**
     * Get the department that the employee belongs to.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /**
     * Get the employee's manager.
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'employee_id');
    }

    /**
     * Get the employees managed by this employee.
     */
    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'manager_id', 'employee_id');
    }

    /**
     * Get the dependents for the employee.
     */
    public function dependents(): HasMany
    {
        return $this->hasMany(Dependent::class, 'employee_id', 'employee_id');
    }
}
