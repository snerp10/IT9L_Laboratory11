<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_id';
    protected $fillable = ['job_title', 'min_salary', 'max_salary'];

    /**
     * Get the employees for the job.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'job_id', 'job_id');
    }
}
